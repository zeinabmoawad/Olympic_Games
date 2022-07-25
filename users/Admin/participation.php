<?php
require_once 'heading_adm.php';
require_once 'viewing_participation.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br><br><br><br><br>
<form class="editM edit" method="post" action="participation_back.php">
    <?php

        echo '<div class="cards"><p style="display: inline">Insert New</p><br>

        <select name="athlete" id="">
            <option disabled selected value="-1">-- Select The Athlete --</option>';    
        $sql = "SELECT A_ID,Fname,Minit,Lname from athlete";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['A_ID'] .'">'.$data['Fname']." ".$data['Minit']." ".$data['Lname']."      ".$data['A_ID'].'</option>';
        
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
        
        echo '<button type = "submit" name="submit">insert</button></div>';

    echo '<br><br><br><br><br><br><br>';
    ?>
    
    <form class="editM edit" method="post" action="participation_back.php">
    <?php

    echo '<div class="cards"><p style="display: inline">delete from table</p><br>
            <select name="athlete2" id="" >
            <option disabled selected value="-1">-- Select The Athlete --</option>';    
        $sql = "SELECT A_ID,Fname,Minit,Lname,M_Name,M_ID from athlete,matche,participation WHERE A_ID = AthleteID AND MatchID = M_ID";
        $res = mysqli_query($conn,$sql);
        
        while ($data = mysqli_fetch_array($res))
        {
           
            echo '<option value="'. $data['A_ID'] ." ".$data['M_ID'].'">'.$data['Fname']." ".$data['Minit']." ".$data['Lname']."      ".$data['A_ID']." ".$data['M_Name'].'</option>';
        
        }
        echo '</select>';

        echo '<button type = "submit" name="submit2">delete</button></div>';
        echo '<br><br><br><br><br>';
    ?>
</form>

<?php
require_once '../footer_users.php';
?>
