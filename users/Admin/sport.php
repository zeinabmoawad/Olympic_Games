<?php
require_once 'heading_adm.php';
require_once 'viewing_sport.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br><br><br><br>
<form class="editM edit" method="post" action="sport_back.php">
    <?php

        echo '<div class="cards"><p>insert new sport</p>
        <input type="text" name="name" placeholder="Sport Name">
        
        <input type="text" name="season" placeholder="Season"><br>

        <button type = "submit" name="submit">Insert</button></div>';

    echo '<br><br><br><br><br>';
    

    echo '<div class="cards"><p style="display: inline">update an sport</p>
            <select name="id" id="" style="display: inline">
            <option disabled selected>-- Select The ID --</option>';
    $sql = "SELECT * from sport";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Sport_ID'] .'">'.$data['Sport_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<input type="text" name="name2" placeholder="Sport Name">
        
        <input type="text" name="season2" placeholder="Season"><br>

        <button type = "submit" name="submit2">update</button></div>';
    echo '<br><br><br><br><br>';

    

    echo '<div class="cards"><p style="display: inline">delete an sport</p>
            <select name="id2" id="" style="display: inline">
            <option disabled selected>-- Select The ID --</option>';
    $sql = "SELECT * from sport";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Sport_ID'] .'">'.$data['Sport_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<button type = "submit" name="submit3">delete</button></div>';
        echo '<br><br><br><br><br>';
    ?>
</form>

<?php
require_once '../footer_users.php';
?>
