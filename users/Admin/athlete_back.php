<?php
require '../../includes/database.php';
if(isset($_POST['submit']))
{
    

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $minit = $_POST['minit'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $weight = $_POST['weight'];
    $start = $_POST['start-date'];
    $username = $_POST['username'];
    $sel = $_POST['gender'];
    $sport = $_POST['sport'];
    $club = $_POST['club'];


    if(empty($username)||empty($fname)||empty($lname)||empty($minit)||empty($age)||empty($country)||empty($weight)||empty($start)||empty($sel)||empty($sport)||empty($club))
    {
        header("Location: athlete.php?error=emptyfields".$username . $fname . $lname . $minit .$age . $country );
        exit();
    } else {
        $results = mysqli_query($conn, "CALL getusers('$username')");
        if ($data = mysqli_fetch_array($results)) {
            header("Location: athlete.php?Used UserName");
            exit();
        } else {
            if(mysqli_next_result($conn)) {

        $sql = "INSERT INTO users (user_name, password, type) VALUES ('$username', '$2y$10\$Gb3thROPBFa5qK5l7ahXSOmsmwu/OXq/C.RCIkgJ6iyFPWzp5OvJm', 'athlete');";
        $results=mysqli_query($conn,$sql);

        $sql = "SELECT * from athlete";
            $results=mysqli_query($conn,$sql);
            $data2 = array();
            //array_push($data2, 0); 
            while ($data = mysqli_fetch_array($results))
            {
                array_push($data2, $data['A_ID']);
            }
            if (!empty($data2)) {
                $new_arr = range(1,max($data2));                                                    
            // use array_diff to find the missing elements 
            $arr = array_diff($new_arr, $data2);
            
            if(empty($arr))
                $id = max($data2) +1;
            else
                $id = min($arr);
            
            }else $id = 1;
        
                
        $sql = "INSERT INTO athlete (A_ID, Fname, Minit, Lname, Gender, Age, Country, Weight, Rank, Warnings, ClubID, Strt_Date, SportID, username) 
                    VALUES ('$id', '$fname', '$minit', '$lname', '$sel', '$age', '$country', '$weight','0','0','$club','$start','$sport','$username' )";
        $results=mysqli_query($conn,$sql);
        if($results)
            header("Location: athlete.php?success=inserted" );
        else 
            header("Location: athlete.php?ERROR" );

            }
        
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
}  

if(isset($_POST['submit2']))
{

    $id = $_POST['id'];
    $fname = $_POST['fname2'];
    $lname = $_POST['lname2'];
    $minit = $_POST['minit2'];
    $age = $_POST['age2'];
    $country = $_POST['country2'];
    $weight = $_POST['weight2'];
    $start = $_POST['start-date2'];
    $username = $_POST['username2'];
    $sel = $_POST['gender2'];
    $sport = $_POST['sport2'];
    $club = $_POST['club2'];
    $b=0;

        
        
        $res = mysqli_query($conn,"CALL getath($id)");
        while ($data = mysqli_fetch_array($res))
        {
            if(mysqli_next_result($conn)) {

                $olduser=$data['username'];
                if(empty($fname)) {
                $fname = $data['Fname'];
                }
                if(empty($minit)) {
                    $minit = $data['Minit'];
                }
                if(empty($lname)) {
                    $lname = $data['Lname'];
                }
                if(empty($age)) {
                    $age = $data['Age'];
                }
                if(empty($country)) {
                    $country = $data['Country'];
                }
                if(empty($weight)) {
                    $weight = $data['Weight'];
                }
                if(empty($start)) {
                    $start = $data['Strt_Date'];
                }
                if(empty($username)) {
                    $username = $data['username'];
                    $b=1;
                }
                if(empty($sel)) {
                    $sel = $data['Gender'];
                }
                if(empty($sport)) {
                    $sport = $data['SportID'];
                }
                if(empty($club)) {
                    $club = $data['ClubID'];
                }
            }
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
                header("Location: athlete.php?usedUsername" );
                exit();

            }
        }
        
        // $sql = "UPDATE athlete SET username=NULL WHERE A_ID='$id'";
        // $results=mysqli_query($conn,$sql);

        //DONT FORGIT THE CASCADE

        $sql = "UPDATE users SET user_name='$username' WHERE user_name='$olduser' ";
        $results=mysqli_query($conn,$sql);

        $sql = "UPDATE athlete 
                    SET Fname='$fname', Minit='$minit', Lname='$lname', Gender='$sel', Age='$age', Country='$country',
                        Weight='$weight', ClubID='$club', Strt_Date='$start', SportID='$sport'
                        
                    WHERE A_ID='$id' ";
        $results=mysqli_query($conn,$sql);
        if($results)
            header("Location: athlete.php?success=inserted" );
        else 
            header("Location: athlete.php?ERROR" );
        
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} 



if(isset($_POST['submit3']))
{

    $id = $_POST['id2'];
    

        //$sql = "CALL getath(:id)";
        $res = mysqli_query($conn,"CALL getath($id)");
        while ($data = mysqli_fetch_array($res))
        {
            if(mysqli_next_result($conn)) {

                $olduser=$data['username'];
            }
        }
        
       
        //$res->next_result();
            
        
        // $sql = "UPDATE athlete SET username=NULL WHERE A_ID='$id'";
        // $results=mysqli_query($conn,$sql);

        //DONT FORGIT THE CASCADE

        $sql = "DELETE FROM users WHERE user_name='$olduser' ";
        $results=mysqli_query($conn,$sql);

        // $sql = "DELETE FROM athlete WHERE A_ID='$id' ";
        // $results=mysqli_query($conn,$sql);
        if($results)
            header("Location: athlete.php?success=inserted" );
        else 
            header("Location: athlete.php?ERROR" );
        
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    EXIT();
} 

?>