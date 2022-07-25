<?php

if(isset($_POST['submit']))
{
    require 'database.php';
    $name = $_POST['name'];
    $ssn = $_POST['ssn'];
    $gender = $_POST['gender'];
    $covid = $_POST['covid'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $cpass = $_POST['confirmpass'];

    if(empty($username) || empty($pass) || empty($name) || empty($cpass) || empty($ssn) || empty($gender))
    {
        header("Location: ../sign.php?error=emptyfields&username=" . $username ."&name=".$name . $username . $pass . $name . $cpass . $ssn . $gender);
        exit();
    } else if(!preg_match("/^[a-zA-Z0-9]*/",$username)) {
        header("Location: ../sign.php?error=invalidusername&username=" . $username );
        exit();
    } else if ($pass !== $cpass) {
        header("Location: ../sign.php?error=passwordsdontmatch&username=" . $username );
        exit();
    } else {
        $sql = "SELECT user_name FROM users WHERE user_name = ? ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../sign.php?error=sqlerror" );
            exit();
        } else {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $row = mysqli_stmt_num_rows($stmt);
            if($row>0)
            {
                header("Location: ../sign.php?error=usernametaken" );
                exit();
            } else {
                $sql3="SELECT count(SSN) FROM audience WHERE SSN=$ssn";
                $results=mysqli_query($conn,$sql3);
                while ($data = mysqli_fetch_array($results)) {
                    $count=$data['count(SSN)'];
                }
                if($count<=0){
                $sql = "INSERT INTO users (user_name, password, type) VALUES (?, ?, 'audience') ";
                $sql2 = "INSERT INTO audience (SSN, Name, Gender, Covid19_Test, username) VALUES (?, ?, ?, ?, ?) ";
                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../sign.php?error=sqlerror" );
                    exit();
                } else {
                    $hashed = password_hash($pass, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ss",$username, $hashed);
                    mysqli_stmt_execute($stmt);
                    
                    if(!mysqli_stmt_prepare($stmt,$sql2))
                    {
                    header("Location: ../sign.php?error=sqlerror" );
                    exit();
                    } else {
                        mysqli_stmt_bind_param($stmt,"issis",$ssn,$name,$gender,$covid,$username);
                        mysqli_stmt_execute($stmt);
                    }

                    header("Location: ../login.php?success=registerred" );
                    exit();
                }
            }
            else{
                header("Location: ../sign.php?error=ssnusedbefore" );
                    exit();

            }
        }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


?>