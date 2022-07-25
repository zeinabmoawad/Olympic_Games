<?php
require_once 'heading_adm.php';
require_once '../Athlete/viewing_athlete.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br><br><br><br>

<form class="edit" method="post" action="athlete_back.php">
    <?php
        $date_today_formatted = date("Y-m-d");
        echo '<div class="cards"><p>insert new athlete</p><br>
        <input type="text" pattern="[A-Za-z]+" title="Insert letters only without spaces" name="fname" placeholder="First Name">
        <input type="text" pattern="[A-Za-z]{1}" title="Insert only 1 letter" name="minit" placeholder="Middle Name">
        <input type="text" pattern="[A-Za-z]+" title="Insert letters only without spaces" name="lname" placeholder="Last Name">
        <input type="number" name="age" placeholder="Age" min="1">
        <input type="text" name="country" placeholder="Country">
        <input type="number" name="weight" placeholder="Weight" min="1">
        <input type="date" name="start-date" max='.$date_today_formatted.' placeholder="Start Date">
        <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="username" placeholder="UserName">
        <select name="gender" id="">
            <option disabled selected value=" ">-- Select The Gender --</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <select name="sport" id="">
            <option disabled selected value=" ">-- Select The Sport --</option>';

        
        $sql = "SELECT Sport_ID,Sport_Name from sport";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Sport_ID'] .'">'.$data['Sport_Name'].'</option>';
        
        }
        echo '</select>';
        echo '<select name="club" id="">
            <option disabled selected value="-1">-- Select The Club --</option>';

        $sql = "SELECT Club_ID,Club_Name from club";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Club_ID'] .'">'.$data['Club_Name'].'</option>';
        
        }
        echo '</select>';
        echo '<br><button type = "submit" name="submit">Insert</button></div>';

    echo '<br><br><br><br><br>';
    ?>

    <form class="edit" method="post" action="athlete_back.php">
    <?php
        $date_today_formatted = date("Y-m-d");
    echo '<div class="cards"><p style="display: inline">update an athlete</p>
            <select name="id" id="" style="display: inline">
            <option disabled selected value="-1">-- Select The ID --</option>';
    $sql = "SELECT * from athlete";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['A_ID'] .'">'.$data['A_ID'].'</option>';
        
        }
        echo '</select><br>';
    echo '<input type="text" pattern="[A-Za-z]+" title="Insert letters only without spaces" name="fname2" placeholder="First Name">
    <input type="text" pattern="[A-Za-z]{1}" title="Insert only 1 letter" name="minit2" placeholder="Middle Name">
    <input type="text" pattern="[A-Za-z]+" title="Insert letters only without spaces" name="lname2" placeholder="Last Name">
    <input type="number" name="age2" placeholder="Age" min="1">
    <input type="text" name="country2" placeholder="Country">
    <input type="number" name="weight2" placeholder="Weight" min="1">
    <input type="date" name="start-date2" max='.$date_today_formatted.' placeholder="Start Date">
    <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="username2" placeholder="UserName">
    <select name="gender2" id="">
        <option disabled selected value="-1">-- Select The Gender --</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
    </select>
    <select name="sport2" id="">
        <option disabled selected value="-1">-- Select The Sport --</option>';

    $sql = "SELECT Sport_ID,Sport_Name from sport";
    $res = mysqli_query($conn,$sql);

    while ($data = mysqli_fetch_array($res))
    {
    
        echo '<option value="'. $data['Sport_ID'] .'">'.$data['Sport_Name'].'</option>';

    }
    echo '</select>';
    echo '<select name="club2" id="">
        <option disabled selected value="-1">-- Select The Club --</option>';

    $sql = "SELECT Club_ID,Club_Name from club";
    $res = mysqli_query($conn,$sql);

    while ($data = mysqli_fetch_array($res))
    {
    
        echo '<option value="'. $data['Club_ID'] .'">'.$data['Club_Name'].'</option>';

    }
    echo '</select><br>';
    echo '<button type = "submit" name="submit2">update</button></div>';
    echo '<br><br><br><br><br>';

    ?>
    
    <form class="edit" method="post" action="athlete_back.php">
    <?php

    echo '<div class="cards"><p style="display: inline">delete an athlete</p>
            <select name="id2" id="" style="display: inline">
            <option disabled selected value="-1">-- Select The ID --</option>';
    $sql = "SELECT * from athlete";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['A_ID'] .'">'.$data['A_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<button type = "submit" name="submit3">delete</button></div>';
        echo '<br><br><br><br><br>';
    ?>
</form>

<?php
require_once '../footer_users.php';
?>
