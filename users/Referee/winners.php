
<?php
require_once '../../includes/database.php';
require_once 'referee_header.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>
<br><br><br>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form class="editM edit" action='winneraction.php' method= 'POST'> 
    <div class="cards">
<label for="first-name">Match Name:</label>
 <select name="mid">
    <option disabled selected>-- Choose match name --</option>
    <?php
    //$sql="SELECT * FROM MATCHE";
    session_start();
    $username = $_SESSION['sessionUser'];
    $sql = "SELECT * FROM referee WHERE username='$username'";
    $results = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($results)) {
        $id = $data['Sp_ID'];
    }
    //$sql = "SELECT * FROM matche WHERE Msport_ID='$id'";
    $results = mysqli_query($conn, "CALL allmatches($id)");
    while ($data = mysqli_fetch_array($results))
    {
       // if(mysqli_next_result($conn)){ 
        echo "<option value='". $data['M_ID'] ."'>" . $data['M_Name'] ."</option>";
        //} 
    }
    ?>
     </select>
 <br></br>
<button type="submit" name="submit" >Submit</button>
</div>
</form><br>
<div class = "myimg3"><img src="../../Pictures/ppppp.png" alt=""></div>

<?php
require_once '../footer_users.php'
?>