<?php
if (isset($_POST['AddSponsor'])) {
    require_once '../../includes/database.php';
    // session_start();
    $fname = $_POST['Company'];
    $mname = $_POST['Product'];
    $nation = $_POST['Nationality'];
    $username = $_POST['UserName'];



    if (empty($fname) || empty($mname) || empty($nation) || empty($username)) {
        header("Location: sponsor.php?error=emptyfields" . $username . $fname . $mname . $nation);
        exit();
    } else {
        //check if this user naem is already used before
        $results = mysqli_query($conn, "CALL getusers('$username')");
        if ($data = mysqli_fetch_array($results)) {
            header("Location: sponsor.php?Used UserName");
            exit();
        } else {
            if(mysqli_next_result($conn)) {

            //insert username and pass word
            $sql = "INSERT INTO users(users.user_name, users.password, users.type) VALUES ('$username', '$2y$10\$Gb3thROPBFa5qK5l7ahXSOmsmwu/OXq/C.RCIkgJ6iyFPWzp5OvJm', 'sponsor')";
            $results = mysqli_query($conn, $sql);

            $sql = "INSERT INTO sponsor (Company,Product,Nationality,username) VALUES('$fname', '$mname','$nation','$username')";
            $results = mysqli_query($conn, $sql);
            if ($results)
                header("Location: sponsor.php?success=inserted");
            else
                header("Location: sponsor.php?ERROR2");
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

    $id = $_POST['Company'];
    $pro = $_POST['Product'];
    $nationality = $_POST['nationality2'];
    $username = $_POST['username2'];
    if (empty($id)) {
        header("Location: sponsor.php?ERROR Select A Company" . $id);
        exit();
    } else {


        $sql = "SELECT * from sponsor WHERE Company='$id'";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            header("Location: sponsor.php?INCORRECTQUER" . $id);
        } else {

            $data = mysqli_fetch_array($res);
            $olduser = $data['username'];
            if (empty($pro)) {
                $pro = $data['Product'];
            }
            if (empty($nationality)) {
                $nationality = $data['Nationality'];
            }
            if (empty($username)) {
                $username = $data['username']; //take old if empty
            }else{//new username
                $sql = "SELECT count(user_name) from users where user_name='$username'";
                $results=mysqli_query($conn,$sql);
                while ($data = mysqli_fetch_array($results))
                {
                   $count=$data['count(user_name)'];
                }
                if($count>0)
                {
                    header("Location: sponsor.php?usedUsername" );
                    exit();

                }

            }



            $sql = "UPDATE users SET user_name='$username' WHERE user_name='$olduser' ";
            $results = mysqli_query($conn, $sql);

            $sql = "UPDATE sponsor SET Product='$pro',Nationality='$nationality'
           WHERE Company='$id'";
            $results = mysqli_query($conn, $sql);
            if ($results)
                header("Location: sponsor.php?success=Updated" . $pro . $nationality . $id . $username);
            else
                header("Location: sponsor.php?ERROR");
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
        header("Location: sponsor.php?ERROR Select A Company" . $id);
        exit();
    } else {
        $sql = "SELECT * from sponsor WHERE Company='$id'";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($res);
        $olduser = $data['username'];


         $sql = "DELETE FROM users WHERE user_name='$olduser' ";
        $results = mysqli_query($conn, $sql);

        if ($results)
            header("Location: sponsor.php?success=Deleted");
        else
            header("Location: sponsor.php?Error");
        

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>