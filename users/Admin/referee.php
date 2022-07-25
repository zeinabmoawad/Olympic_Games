<?php
require_once 'heading_adm.php';
require '../../includes/database.php';
require_once 'viewing_referees.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A</title>
    <link rel="stylesheet" type="text/css" href="..\..\includes\TicketStyling.css">

</head>

<body>
    <form class="edit" action="referee_back.php" method="post">
        <br><br><br><br><br><br>
        <div class="cards"><p>Insert new Referee</p>
        <input type="text" pattern="[A-Za-z]+" title="Insert letters only without spaces" name="FName" placeholder="FName">
        <input type="text" pattern="[A-Za-z]{1}" title="Insert only 1 letter" name="MName" placeholder="MName">
        <input type="text" pattern="[A-Za-z]+" title="Insert letters only without spaces" name="LName" placeholder="LName">
        <input type="text" name="Nationality" placeholder="Nationality">
        <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="UserName" placeholder="UserName">
        <select name="selectedGender" style="margin-top:15px;" class="selectclass">
            <option disabled selected>-- Select Gender --</option>
            <option value='F'>Female</option>
            <option value='M'>Male</option>
        </select>
        <select name="Sport_ID">

            <option disabled selected>-- Select Sport --</option>
            <?php
            $records = mysqli_query($conn, "SELECT Sport_Name,Sport_ID FROM sport ORDER BY Sport_Name");  // Use select query here 
            if (!$records) {
            } else {
                while ($data = mysqli_fetch_array($records)) {
                    echo "<option value=" . $data['Sport_ID'] . ">" . $data['Sport_Name'] . "</option>";
                }
            }
            ?>
        </select>
        
        <br>
        <button type="submit" name="Addreferee">Add Referee</button></div>
        <br><br><br><br><br>
    </form>


    <form class="edit" method="post" action="referee_back.php">
    <div class="cards"><p style="display: inline">Update a Referee</p>
        <select name="id2" style="display: inline">
            <option disabled selected>-- Select The ID --</option>;
            <?php
            $sql = "SELECT * from referee";
            $res = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_array($res)) {

                echo '<option value="' . $data['Referee_ID'] . '">' . $data['Referee_ID'] . '</option>';
            }
            ?>
        </select><br>
        <input type="text" pattern="[A-Za-z]+" title="Insert letters only without spaces" name="fname2" placeholder="First Name">
        <input type="text" pattern="[A-Za-z]{1}" title="Insert only 1 letter" name="minit2" placeholder="Middle Name">
        <input type="text" pattern="[A-Za-z]+" title="Insert letters only without spaces" name="lname2" placeholder="Last Name">
        <input type="text"  name="nationality2" placeholder="Nationality">
        <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="username2" placeholder="UserName">
        <select name="gender2">
            <option disabled selected>-- Select The Gender --</option>
            <option value='M'>Male</option>
            <option value='F'>Female</option>
        </select>
        <select name="sport2" id="">
            <option disabled selected>-- Select The Sport --</option>

            <?php

            $sql = "SELECT Sport_ID,Sport_Name from sport";
            $res = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_array($res)) {

                echo '<option value="' . $data['Sport_ID'] . '">' . $data['Sport_Name'] . '</option>';
            }
            ?>
        </select><br>
        <button type="submit" name="submit2">Update</button></div>
        <br><br><br><br><br>
    </form>

    <form class="edit" method="post" action="referee_back.php">

    <div class="cards"><p style="display: inline">Delete a Referee</p>
            <select name="id3" style="display: inline">
                <option disabled selected>-- Select The ID --</option>
                <?php
                $sql = "SELECT * from referee";
                $res = mysqli_query($conn, $sql);

                while ($data = mysqli_fetch_array($res)) {

                    echo '<option value="' . $data['Referee_ID'] . '">' . $data['Referee_ID'] . '</option>';
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