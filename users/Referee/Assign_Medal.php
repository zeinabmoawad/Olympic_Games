<?php
require_once '../../includes/database.php';
require_once 'referee_header.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<table style="width:95%;">
        <tr style="background-color: moccasin;">
            <th>Fname</th>
            <th>Minit</th>
            <th>Lname</th>
            <th>Sport_Name</th>
            <th>Type</th>
            <th>Winning_Date</th>
        </tr>;
        <?php
        $sql = "select Fname,Minit,Lname,Sport_Name,Type,Winning_Date from athlete,medal,sport
        where medal.Winner_ID=athlete.A_ID AND medal.Sport_Id=sport.Sport_ID";
        $results = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($results)) {
            $id = $data['Fname'];
            $i4 = $data['Minit'];
            $i5 = $data['Lname'];
            $i6 = $data['Sport_Name'];
            $i7 = $data['Type'];
            $i8 = $data['Winning_Date'];
            echo " <tr>
                <th>$id</th>
                <th>$i4</th>
                <th>$i5</th>
                <th>$i6</th>
                <th>$i7</th>
                <th>$i8</th>
            </tr>";
        }

        ?>

    </table>
    <br></br>
    <form class="editM edit" action='medal_action.php' method='POST'>
    <div class="cards">
        <label for="first-name" style="    margin-left: 20px;
    font-size: 20;
    font-style: normal;
    color: black;">Sports Name:</label>
        <select name="mid" style="    margin-left: 20px;
    width: 340;
    height: 30;
    margin-bottom: 30px;">
            <option disabled selected>-- Choose sports name --</option>
            <?php
            session_start();
            $username = $_SESSION['sessionUser'];
            $sql = "SELECT * FROM referee WHERE username='$username'";
            $results = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($results)) {
                $id = $data['Sp_ID'];
            }
            $sql = "SELECT * FROM SPORT WHERE Sport_ID='$id'";
            $results = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($results)) {
                echo "<option value='" . $data['Sport_ID'] . "'>" . $data['Sport_Name'] . "</option>";
            }
            ?>
        </select>
        <br>
        <button type="submit" name="submit">Submit</button>
        </div>
    </form>
   
</body>

</html>