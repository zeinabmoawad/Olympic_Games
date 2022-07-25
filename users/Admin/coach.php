<?php
require_once 'heading_adm.php';
require_once 'viewing_coach.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br><br><br><br>
<form class="editM edit" method="post" action="coach_back.php">
    <?php
    $date_today_formatted = date("Y-m-d");
        echo '<div class="cards"><p>insert new coach</p><br>
        <input type="text" name="name" placeholder="Coach Name">
        <input type="date" name="start_date" max=' . $date_today_formatted .' placeholder="Start Date"><br>

        
        <select name="gender" id="">
            <option disabled selected value=" ">-- Select The Gender --</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>

        <select name="sport" id="">
            <option disabled disabled selected value="-1">-- Select The Sport --</option>';    
        $sql = "SELECT Sport_ID,Sport_Name from sport";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Sport_ID'] .'">'.$data['Sport_Name'].'</option>';
        
        }
        echo '</select>';

        echo '<select name="club" id="">
            <option disabled disabled selected value="-1">-- Select The club --</option>';    
        $sql = "SELECT * from club";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Club_ID'] .'">'.$data['Club_Name'].'</option>';
        
        }
        echo '</select><br>';
        
        echo '<button type = "submit" name="submit">Insert</button></div>';

    echo '<br><br><br><br><br>';
    ?>

    <form class="editM edit" method="post" action="match_back.php">
    <?php
    $date_today_formatted = date("Y-m-d");
    echo '<div class="cards"><p style="display: inline">update an coach</p>
            <select name="id" id="" style="display: inline">
            <option disabled >-- Select The ID --</option>';
    $sql = "SELECT * from coach";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Coach_ID'] .'">'.$data['Coach_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<input type="text" name="name2" placeholder="Coach Name">
        
        <input type="date" name="start_date2" max='.$date_today_formatted.' placeholder="Start Date"><br>

        
        <select name="gender2" id="">
            <option disabled selected value=" ">-- Select The Gender --</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>

        <select name="sport2" id="">
            <option disabled disabled selected value="-1">-- Select The Sport --</option>';    
        $sql = "SELECT Sport_ID,Sport_Name from sport";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Sport_ID'] .'">'.$data['Sport_Name'].'</option>';
        
        }
        echo '</select>';

        echo '<select name="club2" id="">
            <option disabled disabled selected value="-1">-- Select The club --</option>';    
        $sql = "SELECT * from club";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Club_ID'] .'">'.$data['Club_Name'].'</option>';
        
        }
        echo '</select><br>';
    
    echo '<button type = "submit" name="submit2">update</button></div>';
    echo '<br><br><br><br><br>';

    ?>
    
    <form class="editM edit" method="post" action="coach_back.php">
    <?php

    echo '<div class="cards"><p style="display: inline">delete an coach</p>
            <select name="id2" id="" style="display: inline">
            <option disabled >-- Select The ID --</option>';
    $sql = "SELECT * from coach";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Coach_ID'] .'">'.$data['Coach_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<button type = "submit" name="submit3">delete</button></div>';
        echo '<br><br><br><br><br>';
    ?>
</form>

<?php
require_once '../footer_users.php';
?>
