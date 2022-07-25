<?php
require_once '../../includes/database.php';

?>
<?php
 if(isset($_POST['submit1']))
 {
    if(!empty( $_POST['sel']))
    {
    foreach ($_POST['sel'] as $subject)  
    {
      $sql6="UPDATE athlete SET athlete.Warnings=athlete.Warnings+1 WHERE athlete.A_ID=$subject";
     // $sql7="UPDATE Participation SET Results=1 WHERE Participation.MatchID=$MID AND Participation.AthleteID=$subject";
      $results=mysqli_query($conn,$sql6);
      //$results=mysqli_query($conn,$sql7);     
    }
    if($results)
    {
    header("Location: Warnings.php?success");
    }
    else{
        header("Location: Warnings.php?error"); 
        exit();
    }
    }

    else{
      header("Location: Warnings.php?error=emptyfields"); 
      exit();
    }
  }
?>