<?php
require_once 'heading_adm.php';
require '../../includes/database.php';
require_once 'viewing_venue.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venues</title>
    <link rel="stylesheet" type="text/css" href="..\..\includes\TicketStyling.css">

</head>

<body>
    <form class="edit" action="venue_back.php" method="post">
        <br><br><br><br><br><br>
        <div class="cards"><p>Insert new Venue</p>
        <input type="text" pattern="[A-Za-z_]+" title="Insert letters only without spaces" name="FName" placeholder="VenueName">
        <input type="number" min="1" name="Cap" placeholder="Capacity">
        <select name="City">

            <option disabled selected>-- Select City --</option>
            <?php
            $records = mysqli_query($conn, "SELECT City_Name FROM city ORDER BY City_Name");  // Use select query here 
            if (!$records) {
            } else {
                while ($data = mysqli_fetch_array($records)) {
                    echo "<option value=" . $data['City_Name'] . ">" . $data['City_Name'] . "</option>";
                }
            }
            ?>
        </select><br>
        <button type="submit" name="AddVenue">Add Venue</button></div>
        <br><br><br><br><br>
    </form>


    <form class="edit" method="post" action="venue_back.php">
    <div class="cards"> <p style="display: inline">Update a Venue</p>
        <select name="id2" style="display: inline">
            <option disabled selected>-- Select The Venue_Name --</option>;
            <?php
            $sql = "SELECT * from venue";
            $res = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_array($res)) {

                echo '<option value="' . $data['Venue_Name'] . '">' . $data['Venue_Name'] . '</option>';
            }
            ?>
        </select><br>
        <input type="number" min="1" name="cap" placeholder="Capacity">

        <select name="City">

<option disabled selected>-- Select City --</option>
<?php
$records = mysqli_query($conn, "SELECT City_Name FROM city ORDER BY City_Name");  // Use select query here 
if (!$records) {
} else {
    while ($data = mysqli_fetch_array($records)) {
        echo "<option value=" . $data['City_Name'] . ">" . $data['City_Name'] . "</option>";
    }
}
?>
</select><br>
       
        <button type="submit" name="submit2">Update</button></div>
        <br><br><br><br><br>

</form>
        <form class="edit" method="post" action="venue_back.php">

        <div class="cards"><p style="display: inline">Delete a Venue</p>
            <select name="id3" style="display: inline">
                <option disabled selected>-- Select The Venue--</option>
                <?php
                $sql = "SELECT * from venue";
                $res = mysqli_query($conn, $sql);

                while ($data = mysqli_fetch_array($res)) {

                    echo '<option value="' . $data['Venue_Name'] . '">' . $data['Venue_Name'] . '</option>';
                }
                ?>
            </select><br>
            <button type="submit" name="submit3">Delete</button></div>
            <br><br><br><br><br>

        </form>




</body>

</html>
<?php
require_once '..\footer_users.php';
?>