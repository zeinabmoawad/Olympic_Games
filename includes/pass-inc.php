<?php

if(isset($_POST['submit']))
{
    require 'database.php';
   
    $username = $_POST['username'];
    $opass = $_POST['opass'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if(empty($username)||empty($cpass)||empty($pass))
    {
        header("Location: ../pass.php?error=emptyfields".$username.$cpass . $pass );
        exit();
    
    } else {
        $sql = "SELECT * FROM users WHERE user_name = ? ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../pass.php?error=sqlerror" );
            exit();
        } else {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            //mysqli_stmt_store_result($stmt);
            $res = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($res))
            {
                $passCheck = password_verify($opass, $row['password']);
                if ($passCheck == false)
                {
                    header("Location: ../pass.php?error=passwordincorrect". $username . $pass .$passCheck);
                    exit();
                } else if ($passCheck == true) {
                    if ($pass !== $cpass) {
                        header("Location: ../pass.php?error=passwordsdontmatch&username=" . $username );
                        exit();
                    } else {
                        $hashed = password_hash($pass, PASSWORD_DEFAULT);
                        echo 'hello';
                        $sql = "UPDATE users SET users.password ='$hashed' WHERE user_name='$username' ";
                        echo $hashed;

                        $results=mysqli_query($conn,$sql);
                        header("Location: ../login.php?success=PasswordChanged" );
                                    exit();
                    }
                        
                } else {
                    header("Location: ../pass.php?error=passwordincorrect" );
                    exit();
                }
            }  else {
                header("Location: ../pass.php?error=nouser" );
                exit();
            }
        }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} }
else {
    header("Location: ../pass.php?error=accessforbidden" );
    exit();
}


?>