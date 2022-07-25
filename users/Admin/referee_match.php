<?php
require_once 'heading_adm.php';
require_once 'viewing_referee_match.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br><br><br><br>
<form class="editM edit" method="post" action="referee_match_back.php">
    <?php

        echo '<div class="cards"><p style="display: inline">assign a match to a referee</p><br>
        <select name="referee" id="">
            <option disabled selected value="-1">-- Select The Referee --</option>';    
        $sql = "SELECT Referee_ID,Fname,Minit,Lname from referee";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Referee_ID'] .'">'.$data['Fname']." ".$data['Minit']." ".$data['Lname']." ".$data['Referee_ID'].'</option>';
        
        }
        echo '</select>';

        echo '<select name="match" id="">
            <option disabled selected value="-1">-- Select The Match --</option>';    
        $sql = "SELECT M_ID,M_Name from matche";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['M_ID'] .'">'.$data['M_Name'].'</option>';
        
        }
        echo '</select><br>';
        
        echo '<button type = "submit" name="submit">Assign</button></div>';

    echo '<br><br><br><br><br>';
    ?>
    
    <form class="editM edit" method="post" action="referee_match_back.php">
    <?php

    echo '<div class="cards"><p style="display: inline">delete from table</p><br>
            <select name="referee2" id="" >
            <option disabled selected value="-1">-- Select The Referee --</option>';    
        $sql = "SELECT Referee_ID,Fname,Minit,Lname,M_Name,M_ID from referee,matche,referee_matches WHERE RefereeID = Referee_ID AND MatchID = M_ID";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['Referee_ID'] ." ".$data['M_ID'].'">'.$data['Fname']." ".$data['Minit']." ".$data['Lname']." ".$data['Referee_ID']." ".$data['M_Name'].'</option>';
        
        }
        echo '</select>';

        echo '<button type = "submit" name="submit2">delete</button></div>';
        echo '<br><br><br><br><br>';
    ?>
</form>

<?php
require_once '../footer_users.php';
?>
