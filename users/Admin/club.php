<?php
require_once 'heading_adm.php';
require_once 'viewing_club.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br><br><br><br>
<form class="editM edit" method="post" action="club_back.php">
    <?php

        echo '<div class="cards"><p>insert new club</p><br>
        <input type="text" name="name" placeholder="Club Name">
        
        <input type="text" name="loc" placeholder="Location"><br>

        <button type = "submit" name="submit">Insert</button></div>';

    echo '<br><br><br><br><br>';
    ?>

    <form class="editM edit" method="post" action="club_back.php">
    <?php

    echo '<div class="cards"><p style="display: inline">update an club</p>
            <select name="id" id="" style="display: inline">
            <option disabled selected>-- Select The ID --</option>';
    $sql = "SELECT * from club";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Club_ID'] .'">'.$data['Club_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<input type="text" name="name2" placeholder="Club Name">
        
        <input type="text" name="loc2" placeholder="Location"><br>

        <button type = "submit" name="submit2">update</button></div>';
    echo '<br><br><br><br><br>';

    ?>
    
    <form class="editM edit" method="post" action="club_back.php">
    <?php

    echo '<div class="cards"><p style="display: inline">delete an match</p>
            <select name="id2" id="" style="display: inline">
            <option disabled selected>-- Select The ID --</option>';
    $sql = "SELECT * from club";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Club_ID'] .'">'.$data['Club_ID'].'</option>';
        
        }
        echo '</select><br>';
        echo '<button type = "submit" name="submit3">delete</button></div>';
        echo '<br><br><br><br><br>';
    ?>
</form>

<?php
require_once '../footer_users.php';
?>
