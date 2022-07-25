<?php

if(isset($_POST['submit']))
{
    require 'database.php';
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    if(empty($username)||empty($pass))
    {
        header("Location: ../login.php?error=emptyfields".$username . $pass );
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name = ? ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../login.php?error=sqlerror" );
            exit();
        } else {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            //mysqli_stmt_store_result($stmt);
            $res = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($res))
            {
                $passCheck = password_verify($pass, $row['password']);
                if ($passCheck == false)
                {
                    header("Location: ../login.php?error=passwordincorrect". $username . $pass .!$passCheck. $row['password']);
                    exit();
                } else if ($passCheck == true) {
                    session_start();
                    $_SESSION['sessionUser'] = $row['user_name'];
                    
                    if($row['type']=='audience')
                    {
                        header("Location: ../users/Audience/audience.php?success=loggedin"  );
                        exit();
                    } else if ($row['type'] == 'athlete') {
                        header("Location: ../users/Athlete/athlete.php?success=loggedin" );
                        exit();
                    } else if ($row['type'] == 'referee') {
                        header("Location: ../users/Referee/referee.php?success=loggedin" );
                        exit();
                    } else if ($row['type'] == 'sponsor') {
                        header("Location: ../users/Sponsor/sponsor.php?success=loggedin");
                        exit();
                    } else if ($row['type'] == 'admin') {
                        header("Location: ../users/Admin/admin.php?success=loggedin");
                    }
                } else {
                    header("Location: ../login.php?error=passwordincorrect" );
                    exit();
                }
            } else {
                header("Location: ../login.php?error=nouser" );
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../login.php?error=accessforbidden" );
    exit();
}


?>