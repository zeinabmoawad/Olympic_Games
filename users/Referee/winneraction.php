<?php
require_once '../../includes/database.php';
require_once 'referee_header.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>
<br><br>
<form  class="editM edit" action='selectwinner.php' method= 'POST'>
<div class="cards">
<?php
if(isset($_POST['submit']) )
{
    require_once '../../includes/database.php';
    require_once 'referee_header.php';
    echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
    if(isset($_POST['mid']))
    {
        $mid=$_POST['mid'];
       session_start();
    $_SESSION['MID']=$mid;
    echo"<p>Select Winners</p><br>";
    echo "<select name=\"sel[]\" multiple size=10 style=\"width:70%;   height: 100px;\" ";

   $results=mysqli_query($conn,"CALL selectname($mid)");
   while ($data2 = mysqli_fetch_array($results)) { 
    do{
    $MName4 = $data2['Fname']." ".$data2['Minit']." ".$data2['Lname'];
    $a_id=$data2['A_ID'];   
    echo "<option value='". $a_id ."'>" . $MName4 ."</option>";
  }while(mysqli_next_result($conn));
   }
   echo "</select><br>";

  }
  echo "<button type=\"submit1\" name=\"submit1\">Winner</button> <br>";
    }
   else
   {
    header("Location: winners.php?error=emptyfields"); 
    exit();
   }



?>
</div>
</form>
<div class = "myimg3" style="width: 43%"><img src="../../Pictures/ppppp.png" alt=""></div>
<?php
require_once '../footer_users.php'
?>

