<?php
require_once 'heading_adm.php';
require_once 'viewing _matches.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br><br><br><br>
<form class="editM edit" method="post" action="match_back.php">
    <?php
        $date_today_formatted = date("Y-m-d");
        echo '<div class="cards"><p>insert new match</p><br>
        <input type="text" name="name" placeholder="Match Name">
        
        <input type="date" name="date-day" min='.$date_today_formatted.' placeholder="Date Day">

        <input type="time" name="start" placeholder="Start Time">
        <input type="time" name="end" placeholder="End Time">

        <select name="sport" id="">
            <option disabled disabled selected value="-1">-- Select The Sport --</option>';    
        $sql = "SELECT Sport_ID,Sport_Name from sport";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Sport_ID'] .'">'.$data['Sport_Name'].'</option>';
        
        }
        echo '</select>';

        echo '<select name="venue" id="">
            <option disabled disabled selected value="-1">-- Select The Venue --</option>';    
        $sql = "SELECT * from venue";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Venue_Name'] .'">'.$data['Venue_Name'].'</option>';
        
        }
        echo '</select><br>';
        
        echo '<button type = "submit" name="submit">Insert</button></div>';

    echo '<br><br><br><br><br>';
    ?>

    <form class="editM edit" method="post" action="match_back.php">
    <?php
        $date_today_formatted = date("Y-m-d");
    echo '<div class="cards"><p style="display: inline">update an match</p>
            <select name="id" id="" style="display: inline">
            <option disabled >-- Select The ID --</option>';
    $sql = "SELECT * from matche";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['M_ID'] .'">'.$data['M_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<input type="text" name="name2" placeholder="Match Name">
        
        <input type="date" name="date-day2" min='.$date_today_formatted.' placeholder="Date Day">

        <input type="time" name="start2" placeholder="Start Time">
        <input type="time" name="end2" placeholder="End Time">

        <select name="sport2" id="">
            <option disabled selected value="-1">-- Select The Sport --</option>';    
        $sql = "SELECT Sport_ID,Sport_Name from sport";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Sport_ID'] .'">'.$data['Sport_Name'].'</option>';
        
        }
        echo '</select>';

        echo '<select name="venue2" id="">
            <option disabled selected value="-1">-- Select The Venue --</option>';    
        $sql = "SELECT * from venue";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Venue_Name'] .'">'.$data['Venue_Name'].'</option>';
        
        }
        echo '</select><br>';
    
    echo '<button type = "submit" name="submit2">update</button></div>';
    echo '<br><br><br><br><br>';

    ?>
    
    <form class="editM edit" method="post" action="match_back.php">
    <?php

    echo '<div class="cards"><p style="display: inline">delete an match</p>
            <select name="id2" id="" style="display: inline">
            <option disabled >-- Select The ID --</option>';
    $sql = "SELECT * from matche";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['M_ID'] .'">'.$data['M_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<button type = "submit" name="submit3">delete</button></div>';
        echo '<br><br><br><br><br>';
    ?>
</form>

<?php
require_once '../footer_users.php';
?>
