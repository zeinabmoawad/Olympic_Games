<?php
require_once '../../includes/database.php';
 session_start();
 $MID=$_SESSION['MID'];
 if(isset($_POST['submit1']))
 {
    if(!empty( $_POST['sel']))
    {
    foreach ($_POST['sel'] as $subject)  
    {
      $sql6="UPDATE athlete SET athlete.Rank=athlete.Rank+1 WHERE athlete.A_ID=$subject";
      $sql7="UPDATE Participation SET Results=1 WHERE Participation.MatchID=$MID AND Participation.AthleteID=$subject";
      $results=mysqli_query($conn,$sql6);
      $results=mysqli_query($conn,$sql7);     
    }
    if($results)
    {
    header("Location: winners.php?success");
    }
    else{
        header("Location: winners.php?error"); 
        exit();
    }
    }
    else{
        header("Location: winners.php?error=emptyfields"); 
        exit();

    }

}