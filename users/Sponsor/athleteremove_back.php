<?php //atlete
if (isset($_POST['submit3'])) {
    require_once '../../includes/database.php';
    // session_start();
    $ID = $_POST['athlete_name'];
    if (empty($ID)) {
        header("Location: sponsor.php?error=emptyfields" . $ID);
        exit();
    }
    else{
  

        //check if this user naem is already used before
        session_start();
        $company=$_SESSION['CompanyName'];
        $sql = "UPDATE athlete set Athlete_Sponsor='$company' WHERE A_ID=$ID";
        $results = mysqli_query($conn, $sql);
       

            if ($results)
               header("Location: sponsor.php?success=Sponoered");
           else
               header("Location: sponsor.php?ERROR2");
    


        exit();
    
}
}
?>
<?php //atlete
if (isset($_POST['submit4'])) {
    require_once '../../includes/database.php';
    // session_start();
    $ID = $_POST['sport_name'];
    if (empty($ID)) {
        header("Location: sponsor.php?error=emptyfields" . $ID);
        exit();
    }
    else{

        //check if this user naem is already used before
        session_start();
        $company=$_SESSION['CompanyName'];
        //echo $company .$
        $sql = "INSERT INTO sports_sponsors (Sport_Id,company) VALUES ($ID,'$company');";
        $results = mysqli_query($conn, $sql);
       

            if ($results)
               header("Location: sponsor.php?success=Sponoered");
           else
               header("Location: sponsor.php?ERROR2");
    


        exit();
    
}
}
?>
<?php
if (isset($_POST['submit5'])) {
    require_once '../../includes/database.php';
    if(!empty( $_POST['id3']))
    {
        session_start();
        $sponsor=$_SESSION['Company'];
        $selectedname=$_POST['id3'];
        $sql="UPDATE athlete SET Athlete_Sponsor=NULL WHERE A_ID = '$selectedname';";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
        header("Location: sponsor.php?success");
        }
        else{
        header("Location: sponsor.php?error"); 
        exit();
        }
    }

    }
    
?>

<?php
if (isset($_POST['submit6'])) {
    require_once '../../includes/database.php';
    if(!empty( $_POST['id4']))
    {
        session_start();
        $sponsor1=$_SESSION['Company'];
        $selectedname1=$_POST['id4'];
        $sql="DELETE FROM sports_sponsors WHERE sports_sponsors.Sport_Id=$selectedname1 AND sports_sponsors.company='$sponsor1';";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
        header("Location: sponsor.php?success".$selectedname1 .$sponsor1);
        }
        else{
        header("Location: sponsor.php?error"); 
        exit();
        }
    }

    }
    
?>


