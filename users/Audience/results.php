<?php
require_once '../../includes/database.php';
require_once 'heading_Aud.php';
echo '<link rel="stylesheet" type="text/css" href="../includes/style.css">';
?>

<?php

echo "
                <br></br>
                <table style=\"width:60%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Match Name</th>
                    <th>Name of the winner</th>
                    
                </tr>";

$sql ="SELECT Fname,Minit,Lname,M_Name FROM participation,athlete,matche WHERE participation.results=1 AND athlete.A_ID=participation.AthleteID AND matche.M_ID=participation.MatchID";
$results1=mysqli_query($conn,$sql);
 while ($data = mysqli_fetch_array($results1))
 {
     $Mname=$data['M_Name'];
     $Fname=$data['Fname']." ".$data['Minit']." ".$data['Lname'];
     echo "<tr>
     <th>$Mname</th>
     <th>$Fname</th>
     
 </tr>";

 }
 echo "</table>";




?>

<?php
    require_once '../../includes/footer.php';
?>