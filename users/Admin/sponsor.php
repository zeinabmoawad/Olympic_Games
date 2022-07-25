<?php
require_once 'heading_adm.php';
require '../../includes/database.php';
require_once '../Sponsor/viewing_sponsor.php';
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
    <form class="edit" action="sponsor_back.php" method="post">
        <br><br><br><br><br><br>
        <div class="cards"><p>Insert new Sponsor</p>
        <input type="text" pattern="[A-Za-z_]+" title="Insert letters or _ only without spaces" name="Company" placeholder="Company">
        <input type="text" name="Product" placeholder="Product">
        <input type="text" name="Nationality" placeholder="Nationality">
        <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="UserName" placeholder="UserName">
        <br>
        <button type="submit" name="AddSponsor">Add Sponsor</button></div>
        <br><br><br><br><br>
    </form>


    <form class="edit" method="post" action="sponsor_back.php">
    <div class="cards"><p style="display: inline">Update a Sponsor</p>
        <select name="Company" style="display: inline">
            <option disabled selected>-- Select The Company --</option>;
            <?php
            $sql = "SELECT * from sponsor";
            $res = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_array($res)) {

                echo '<option value="' . $data['Company'] . '">' . $data['Company'] . '</option>';
            }
            ?>
        </select><br>
        <input type="text" name="Product" placeholder="Product">
        <input type="text" name="nationality2" placeholder="Nationality">
        <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="username2" placeholder="UserName"><br>
        
       
        <button type="submit" name="submit2">Update</button></div>
        <br><br><br><br><br>

    </form>
    

        <form class="edit" method="post" action="sponsor_back.php">

        <div class="cards"><p style="display: inline">Delete a Sponsor</p>
            <select name="id3" style="display: inline">
                <option disabled selected>-- Select The Company --</option>
                <?php
                $sql = "SELECT * from sponsor";
                $res = mysqli_query($conn, $sql);

                while ($data = mysqli_fetch_array($res)) {

                    echo '<option value="' . $data['Company'] . '">' . $data['Company'] . '</option>';
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