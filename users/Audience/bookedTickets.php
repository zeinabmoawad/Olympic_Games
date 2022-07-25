<?php
    require_once 'heading_Aud.php';
?>


<?php
require_once '../../includes/database.php';
?>

<?php
session_start();
$usename=$_SESSION['sessionUser'];

$sql = "SELECT  SSN FROM audience WHERE username= '$usename'";
$results=mysqli_query($conn,$sql);
while ($data = mysqli_fetch_array($results)) {
    $ssn=$data['SSN'];
}


echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Ticket ID</th>
                    <th>Type</th>
                    <th>SeatNo.</th>
                    <th>Booking Date</th>
                    <th>Venue</th>
                    <th>City</th>
                    <th>Match Date</th>
                    <th>Start Time</th>
                    <th>Price</th>
                </tr>";

         

$sql ="SELECT ID,DateDay,S_Time,Venue_N,CityName,Seat_Number,price.type,price,Booking_Date FROM ticket as x,matche as y,venue,price WHERE x.M_ID=y.M_ID AND Venue_N=Venue_Name AND x.type=price.type AND Audience_SSN=$ssn";
$results1=mysqli_query($conn,$sql);
 while ($data = mysqli_fetch_array($results1))
 {
     $x1=$data['ID'];
     $x7=$data['DateDay'];
     $x5=$data['Venue_N'];
     $x6=$data['CityName'];

     $x3=$data['Seat_Number'];
     $x2=$data['type'];
     $x9=$data['price'];
     $x4=$data['Booking_Date'];
     $x8=$data['S_Time'];

     echo "<tr>
     <th>$x1</th>
     <th>$x2</th>
     <th>$x3</th>
     <th>$x4</th>
     <th>$x5</th>
     <th>$x6</th>
     <th>$x7</th>
     <th>$x8</th>
     <th>$x9</th>

 </tr>";

 }
 echo "</table>";




?>

<?php
require_once '..\footer_users.php';
?>