<?php
require_once '../../includes/database.php';
require_once 'referee_header.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>
<br><br>
<form class="editM edit" method='POST' action="setback.php">
<div class="cards">
    <?php
    if (isset($_POST['submit'])) {
        //echo "pressed";
        $mid=$_POST['mid'];
       // $mid=2;
        if (empty($mid)) {
            header("Location: Warnings.php?error=emptyfields");
            exit();
        } else {
            //right then getting lthles playing this atch
            $sql = "SELECT Fname,Minit,Lname,athlete.A_ID FROM athlete,participation WHERE participation.MatchID=$mid AND participation.AthleteID=athlete.A_ID;";
            //$sql = "SELECT Fname,Minit,Lname,athlete.A_ID  FROM athlete, participation WHERE participation.MatchID=1 AND participation.AthleteID=athlete.A_ID AND participation.AthleteID=1 ;";
            //$sql ="SELECT Fname,Minit,Lname FROM athlete where A_ID=1 " ;
            $res = mysqli_query($conn, $sql);
            if (!$res) {
                header("Location: Warnings.php?INCORRECTQUER" . $mid);
            } else {
               // echo"hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii";
               echo "<select name=\"sel[]\" multiple size=50 style=\" margin-left: 20px;width: 340;height:100px; margin-bottom: 40px;\">";
                echo"<option disabled selected>-- Add Warnings --</option>";
                
               while( $data = mysqli_fetch_array($res))
               {
                 
                $MName4 = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
                //$MName4="Ali";
                $a_id=$data['A_ID'];  
               echo "<option value='". $a_id ."'>" . $MName4 ."</option>";
               //echo $MName4;
               }
               echo"</select><br>";

            }


        }
        echo"<button type=\"submit\" name=\"submit1\">Submit</button>";
    } else {

    }
    ?>
</div>
</form>
<br>
<div class = "myimg4" style="width: 20%"><img src="../../Pictures/kisspng-association-football-referee-game-sport-wedstrijd-handball-5ac54bd384e642.2521351815228794435444.png" alt=""></div>
<?php
require_once '../footer_users.php'
?>