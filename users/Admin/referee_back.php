<?php
if (isset($_POST['Addreferee'])) {
    require_once '../../includes/database.php';
    // session_start();
    $fname = $_POST['FName'];
    $mname = $_POST['MName'];
    $lname = $_POST['LName'];
    $gender = $_POST['selectedGender'];
    $nation = $_POST['Nationality'];
    $sport = $_POST['Sport_ID'];
    $username = $_POST['UserName'];



    if (empty($fname) || empty($mname) || empty($lname) || empty($gender) || empty($nation) || empty($sport) || empty($username)) {
        header("Location: referee.php?error=emptyfields" . $username . $fname . $mname . $lname . $gender . $nation . $sport);
        exit();
    } else {
        //check if this user naem is already used before
        
        $results = mysqli_query($conn, "CALL getusers('$username')");
        if ($data = mysqli_fetch_array($results)) {
            header("Location: referee.php?Used UserName");
            exit();
        } else {
            if(mysqli_next_result($conn)) {
            //insert username and pass word
            $sql = "INSERT INTO users(users.user_name, users.password, users.type) VALUES ('$username', '$2y$10\$Gb3thROPBFa5qK5l7ahXSOmsmwu/OXq/C.RCIkgJ6iyFPWzp5OvJm', 'referee')";
            $results = mysqli_query($conn, $sql);


            $sql = "SELECT * from referee";
            $results = mysqli_query($conn, $sql);
            $data2 = array();
            //array_push($data2, 0); 
            while ($data = mysqli_fetch_array($results)) {
                array_push($data2, $data['Referee_ID']);
            }
            if (!empty($data2)) {
                $new_arr = range(1, max($data2));
                // use array_diff to find the missing elements 
                $arr = array_diff($new_arr, $data2);


                if (empty($arr))
                    $id = max($data2) + 1;
                else
                    $id = min($arr);
            } else $id = 1; //first one
            $sql = "INSERT INTO referee (Referee_ID,Fname,Minit,Lname,Gender,Nationality,Sp_ID,username)
            VALUES($id, '$fname', '$mname', '$lname', '$gender', '$nation',$sport, '$username')";
            $results = mysqli_query($conn, $sql);
            if ($results)
                header("Location: referee.php?success=inserted");
            else
                header("Location: referee.php?ERROR2023" . $id . $fname . $mname . $lname . $gender . $nation . $sport . $username);
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>
<?php
if (isset($_POST['submit2'])) {
    require_once '../../includes/database.php';

    $id = $_POST['id2'];
    $fname = $_POST['fname2'];
    $minit = $_POST['minit2'];
    $lname = $_POST['lname2'];
    $nationality = $_POST['nationality2'];
    $username = $_POST['username2'];
    $gen = $_POST['gender2'];
    $sport = $_POST['sport2'];
    $b=0;
    if (empty($id)) {
        header("Location: referee.php?ERROR Select An ID" . $id);
        exit();
    } else {


        $sql = "SELECT * from referee WHERE Referee_ID=$id";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            header("Location: referee.php?INCORRECTQUER" . $id);
        } else {

            $data = mysqli_fetch_array($res);
            $olduser = $data['username'];
            if (empty($fname)) {
                $fname = $data['Fname'];
            }
            if (empty($minit)) {
                $minit = $data['Minit'];
            }
            if (empty($lname)) {
                $lname = $data['Lname'];
            }
            if (empty($nationality)) {
                $nationality = $data['Nationality'];
            }
            if (empty($username)) {
                $username = $data['username']; //take old if empty
                $b=1;
            }
            if (empty($gen)) {
                $gen = $data['Gender'];
            }
            if (empty($sport)) {
                $sport = $data['Sp_ID'];
            }

            if($b==0) {
            $sql = "SELECT count(user_name) from users where user_name='$username'";
            $results=mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($results))
            {
                $count=$data['count(user_name)'];
            }
            if($count>0)
            {
                header("Location: referee.php?usedUsername" );
                exit();

            }
        }


            $sql = "UPDATE users SET user_name='$username' WHERE user_name='$olduser' ";
            $results = mysqli_query($conn, $sql);

            $sql = "UPDATE referee SET Fname='$fname', Minit='$minit', Lname='$lname', Gender='$gen',Nationality='$nationality',Sp_ID=$sport
           WHERE Referee_ID=$id";
            $results = mysqli_query($conn, $sql);
            if ($results)
                header("Location: referee.php?success=Updated" . $id . $fname . $minit . $lname . $gen . $nationality . $sport);
            else
                header("Location: referee.php?ERROR" . $id . $fname . $minit . $lname . $gen . $nationality . $sport);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>

<?php

if (isset($_POST['submit3'])) {

    require_once '../../includes/database.php';
    $id = $_POST['id3'];
    if (empty($id)) {
        header("Location: referee.php?ERROR Select An ID" . $id);
        exit();
    } else {
        $sql = "SELECT * from referee WHERE Referee_ID='$id'";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($res);
        $olduser = $data['username'];


        $sql = "DELETE FROM users WHERE user_name='$olduser' ";
        $results = mysqli_query($conn, $sql);
        if ($results)
            header("Location: referee.php?success=Deleted");
        else
            header("Location: referee.php?ERROR");
        

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>