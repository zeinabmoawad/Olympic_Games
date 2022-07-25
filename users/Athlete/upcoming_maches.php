<?php
require_once '../../includes/database.php';
require_once 'athleteheader.php';
?>
<br>

<?php
 echo "
 <br></br>
 <table style=\"width:95%;\">
 <tr style=\"background-color: moccasin;\">
     <th>Match Name</th>
     <th>Match Date</th>
     <th>Start Time</th>
     <th>End Time</th>
     <th>Venue Name</th>
     <th>Sport Name</th>
 </tr>";
$sql = "SELECT * FROM matche";
$results=mysqli_query($conn,$sql);
while ($data = mysqli_fetch_array($results))
{

$date = $data['DateDay'];
    $date_today_formatted = date("Y-m-d");
    if ($date > $date_today_formatted)
    {
        $i4 = $data['M_Name'];
        $i5 = $data['DateDay'];
        $i6 = $data['S_Time'];
        $i7 = $data['E_Time'];
        $i8 = $data['Venue_N'];
        $i9 = $data['Msport_ID'];
        $sportname="";
        $sql2 = "SELECT * FROM sport WHERE Sport_ID =$i9";
        $results2=mysqli_query($conn,$sql2);
        while ($data2 = mysqli_fetch_array($results2))
        {
            $sportname=$data2['Sport_Name'];
        }
              echo "<tr>
                       <th>$i4</th>
                       <th>$i5</th>
                       <th>$i6</th>
                       <th>$i7</th>
                       <th>$i8</th>
                       <th>$sportname</th>
                   </tr>";
               
   }
}
   echo "</table>";

    
?>

<br><br><br><br>
</body>
</html>
<?php
require_once '..\footer_users.php';
?>