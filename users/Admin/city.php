<?php
require_once 'heading_adm.php';
require_once 'viewing_city.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br><br><br><br>
<form class="editM edit" method="post" action="city_back.php">
    

       <div class="cards"><p>insert new city</p><br>
        <input type="text" pattern="[A-Za-z_]+" title="Insert letters or _ only without spaces" name="name" placeholder="City Name">
        
        <input type="text" name="air" placeholder="Near Airport"><br>

        <button type = "submit" name="submit">Insert</button></div>

    <br><br><br><br><br>

 
</form>

<form class="editM edit" method="post" action="city_back.php">
    <div class="cards"><p style="display: inline">update an city</p>
            <select name="name2" style="display: inline">
            <option disabled selected>-- Select The city --</option>';
            <?php
        $sql = "SELECT * from city";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['City_Name'] .'">'.$data['City_Name'].'</option>';
        
        }
        ?>
        </select><br>
        <input type="text" name="air2" placeholder="Near Airport"><br>

        <button type = "submit" name="submit2">update</button></div>
    <br><br><br><br><br>

</form>

<form class="editM edit" method="post" action="city_back.php">
    <?php

    echo '<div class="cards"><p style="display: inline">delete an city</p>
            <select name="name3" style="display: inline">
            <option disabled selected>-- Select The city --</option>';
    $sql = "SELECT * from city";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['City_Name'] .'">'.$data['City_Name'].'</option>';
        
        }
        echo '</select><br>';
        echo '<button type = "submit" name="submit3">delete</button></div>';
        echo '<br><br><br><br><br>';
    ?>
</form>

<?php
require_once '../footer_users.php';
?>
