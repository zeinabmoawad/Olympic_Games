<?php
require_once '../../includes/database.php';
require_once 'sponsor_header.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
?>

<?php
    
     session_start();
     $username = $_SESSION['sessionUser'];
    $result = mysqli_query($conn,"CALL getallsponsor('$username')");
    echo "<br></br>";
    while($data = mysqli_fetch_array($result)){
        if(mysqli_next_result($conn)){
        $_SESSION['CompanyName'] = $data['Company'];
        $id = $data['Company'];
        $i4 = $data['Product'];
        $i5 = $data['Nationality'];
         echo "

                <div class=\"class1\"> 
         <div><h1>Welcome Home!</h1></div>
        <div>
               <p> Company : $id </p>
               <p> Product :$i4 </p>
               <p> Nationality:  $i5 </p>
            <div class=\"myimg\"><img src=\"../../Pictures/WhatsApp_Image_2022-01-06_at_11.56.58_PM-removebg-preview.png\"></div>
         </div>
        
     </div><br>";
        }
    }
    ///////////////====================GADED =========================////////////////////////////////////



    echo "
    <br></br>
    <table style=\"width:95%;\">
    <tr style=\"background-color: moccasin;\">
        <th>Name</th>
        <th>Age</th>
        <th>Country</th>
        <th>Weight</th>
        <th>Rank</th>
        <th>Warning</th>
        <th>Gender</th>
        <th>Sport Name</th>
        <th>Club Name </th>
    </tr>";
$sql1 = "SELECT * FROM athlete WHERE athlete.Athlete_Sponsor='$id'";
$results1=mysqli_query($conn,$sql1);
while ($data1 = mysqli_fetch_array($results1))
{
$i12 = $data1['Gender'];
$i13 = $data1['Age'];
$i6 = $data1['Country'];
$i7 = $data1['Weight'];
$i8 = $data1['Rank'];
$i9 = $data1['Warnings'];
$i10 = $data1['ClubID'];
$i11 = $data1['SportID'];
$clubname="";
$sportname="";
$MName4 = $data1['Fname']." ".$data1['Minit']." ".$data1['Lname'];
$sql2 = "SELECT Club_Name FROM club WHERE Club_ID =$i10";
$results2=mysqli_query($conn,$sql2);
while ($data2 = mysqli_fetch_array($results2))
{
 $clubname=$data2["Club_Name"];
}
$sql3 = "SELECT Sport_Name FROM sport WHERE Sport_ID =$i11";
$results3=mysqli_query($conn,$sql3);
while ($data3 = mysqli_fetch_array($results3))
{
 $sportname=$data3["Sport_Name"];
}
echo "<tr>
<th>$MName4</th>
<th>$i13</th>
<th>$i6</th>


<th>$i7</th>
<th>$i8</th>
<th>$i9</th>
<th>$i12</th>
<th>$sportname</th>
<th>$clubname</th>
</tr>";
    
}
echo "</table>";

    //Sponsored Sports
    //echo"<p>Sponsored Sports</p>";  ////////////////EFTKRRRRRRRR HHTT8YR
    echo "
    <br></br>
    <table style=\"width:50%;\">
    <tr style=\"background-color: moccasin;\">
        <th>Sport</th>
        <th>Season</th>
    </tr>";
    $sql = "SELECT Sport_Name,Season FROM sport,sports_sponsors WHERE sport.Sport_ID=sports_sponsors.Sport_Id AND sports_sponsors.company='$id'order by (Sport_Name)";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $name = $data['Sport_Name'];
         $season = $data['Season'];
         echo "<tr>
         <th>$name</th>
         <th>$season</th>
     </tr>";
 
    }

    echo "</table>";

    ?> 
<br><br><br><br><br><br>
<div class="grid-inner2">
    <form class="edit" action="athleteremove_back.php" method="post" >
        
        <div class="cards cards1"><p style="display: inline"> Sponsor new Athlete</p>
        <select name="athlete_name" style="display: inline">
        <option disabled selected>-- Select The Athlete --</option>
        <?php
         $sql = "SELECT Fname,Minit,Lname,A_ID from athlete where A_ID NOT IN(SELECT athlete.A_ID  from athlete,sponsor where athlete.Athlete_Sponsor=sponsor.Company) ORDER BY(Fname)";
        $res = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_array($res)) {
    echo '<option value="' . $data['A_ID'] . '">' . $data['Fname'] ." '". $data['Minit']."' ". $data['Lname']." ".$data['A_ID']. '</option>';
}
?>
</select><br>
<button type="submit" name="submit3">Sponsor</button></div>


    </form>

<br><br>
    <form class="edit" action="athleteremove_back.php" method="post">
        <div class="cards cards1"><p style="display: inline">Sponsor new Sport</p>
        <select name="sport_name" style="display: inline">
        <option disabled selected>-- Select The Sport --</option>
        <?php
        $com=$_SESSION['CompanyName'];
         $sql = "SELECT Sport_ID,Sport_Name from sport
         where Sport_ID NOT IN(SELECT Sport_Id from sports_sponsors where sports_sponsors.company='$com') 
         ORDER BY(Sport_Name)";
        $res = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_array($res)) {
      echo '<option value="' . $data['Sport_ID'] . '">' . $data['Sport_Name'] . '</option>';
}
?>
</select><br>
<button type="submit" name="submit4">Sponsor</button></div>
<br><br>

    </form>

    
    <form class="edit" method="post" action="athleteremove_back.php">

    <div class="cards cards1"><p style="display: inline">UnSposor a Athelete</p>
    <select name="id3" style="display: inline">
        <option disabled selected>-- Select The Athelete --</option>
        <?php
            
     session_start();
     $username1 = $_SESSION['sessionUser'];
    $sql = "SELECT Company FROM sponsor WHERE username ='$username1'";
    echo "<br></br>";
    $results=mysqli_query($conn,$sql);
    while($data = mysqli_fetch_array($results)){
        $sponsorid = $data['Company'];
    }
    session_start();
    $_SESSION['Company']=$sponsorid2;
        $sql = "SELECT Fname,Minit,Lname,A_ID from athlete where athlete.Athlete_Sponsor='$sponsorid'";
        $res = mysqli_query($conn, $sql);

        while ($data = mysqli_fetch_array($res)) {

            $MName4 = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
            
            echo '<option value="' . $data['A_ID'] . '">' . $MName4 ." ". $data['A_ID']. '</option>';
        }
        ?>
    </select><br>
    <button type="submit" name="submit5">Delete</button></div>


</form>
<br><br>

<form class="edit" method="post" action="athleteremove_back.php">

<div class="cards cards1"><p style="display: inline">UnSposor a Sport </p>
<select name="id4" style="display: inline">
    <option disabled selected>-- Select The Sport --</option>
    <?php
        
 session_start();
 $username1 = $_SESSION['sessionUser'];
$sql = "SELECT Company FROM sponsor WHERE username ='$username1'";
echo "<br></br>";
$results=mysqli_query($conn,$sql);
while($data = mysqli_fetch_array($results)){
    $sponsorid3 = $data['Company'];
}
session_start();
$_SESSION['Company']=$sponsorid3;
$sql = "SELECT Sport_Name,Sport.Sport_ID from sports_sponsors,sport where company='$sponsorid' AND Sport.Sport_ID=sports_sponsors.Sport_Id ";
$res = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_array($res)) {
        echo "<option value='". $data['Sport_ID'] ."'>" . $data['Sport_Name'] ."</option>";
    }
    ?>
</select><br>
<button type="submit" name="submit6">Delete</button></div>
<br><br><br><br>

</form></div>

    
 
</body>
</html>
<?php
require_once '..\footer_users.php';
?>
