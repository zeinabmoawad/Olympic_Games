<?php
require_once '../../includes/database.php';

if(isset($_POST['submit']))
{
    $id=$_POST['mid'];
    $warn=$_POST['sel'];
    $sql="UPDATE referee SET referee.rate=referee.rate+$warn WHERE Referee_ID=$id";
    $results=mysqli_query($conn,$sql);
    if($results)
    header("Location: setrate.php?success");
    else
    header("Location: setrate.php?error");

}

?>