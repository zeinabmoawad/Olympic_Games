<?php
require_once '../../includes/database.php';
require_once 'athleteheader.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>
<br><br><br><br>
<form class="editM edit" action='rate.php' method= 'POST'> 
<div class="cards"><label for="first-name">Referee Name:</label>
 <select name="mid">
    <option disabled selected>-- Choose referee name --</option>
    <?php
    $sql="SELECT * FROM REFEREE";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $MName4 = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
        echo "<option value='". $data['Referee_ID'] ."'>" . $MName4 ." ". $data['Referee_ID'] ."</option>";

    }
    ?>
     </select>
     
     <select name=sel>
    <option disabled selected>-- Add Rate --</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>
<br></br>
<button type = "submit" name="submit">Insert</button></div>

<br>
</form>
<?php
require_once '..\footer_users.php';
?>
