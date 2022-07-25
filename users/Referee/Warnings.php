<?php
require_once '../../includes/database.php';
require_once 'referee_header.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br>
<form class="editM edit" action="warning_back.php" method='POST'>
    <div class="cards">
        <label for="first-name" style="    margin-left: 20px;
    font-size: 20;
    font-style: normal;
    color: black;">Match Name:</label>
        <select name="mid" style="    margin-left: 20px;
    width: 340;
    height: 30;
    margin-bottom: 30px;">
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
            while ($data = mysqli_fetch_array($results)) {
               //  while(mysqli_next_result($conn)){ 
                echo "<option value='" . $data['M_ID'] . "'>" . $data['M_Name'] . "</option>";
             //}

            }
            ?>
        </select>
        <br>
        <button type="submit" name="submit">Submit</button>

    </div>
</form>
<br>
<div class = "myimg4"><img src="../../Pictures/kisspng-association-football-referee-game-sport-wedstrijd-handball-5ac54bd384e642.2521351815228794435444.png" alt=""></div>

<?php
require_once '../footer_users.php'
?>

