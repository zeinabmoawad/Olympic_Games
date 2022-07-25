<?php
// Store the submitted M_ID by POST method, stored 
// Temporarily in $_POST structure.
session_start(); //////////////////////////////////////////////////////////////
$_SESSION['M_ID'] = $_POST['sub'];
$x = $_SESSION['M_ID'];
if (!isset($_POST['sub'])) {
    // header("Location:Ticket?error=wrongpassword or username");
    header("Location:audience.php");
    exit();
}

?>



<?php
require_once 'heading_Aud.php';
?>

<?php
require_once '../../includes/database.php';

$records = mysqli_query($conn, "SELECT M_Name,DateDay,S_Time,E_Time,Venue_N FROM matche WHERE M_ID='$x'");  // Use select query here 
if (!$records) {
} else {
    while ($data = mysqli_fetch_array($records)) {
        $MName = $data['M_Name'];
        $d = $data['DateDay'];
        $st = $data['S_Time'];
        $en = $data['E_Time'];
        $ve = $data['Venue_N'];
    }
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" type="text/css" href="..\..\includes\TicketStyling.css">
    <link rel="stylesheet" type="text/css" href="..\..\includes\style.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</head>

<body>

    <form action="TicketSummary.php" method="POST">
        <div class="container">
            <div style="border-style: solid;">
                <img class="icon" src="..\..\Pictures\sport.png" alt="calender">
                <p><?php echo "$MName" ?></p>
            </div>

            <div style="border-style: solid;">
                <img class="icon" src="..\..\Pictures\avenue.png" alt="calender">
                <p><?php echo "$ve" ?></p>
            </div>

            <div style="border-style: solid;">
                <img class="icon" src="..\..\Pictures\date.png" alt="calender">
                <p><?php echo "$d" ?></p>
            </div>

            <div style="border-style: solid;">
                <img class="icon" src="..\..\Pictures\time.png" alt="calender">
                <p><?php echo "$st - $en" ?></p>
            </div>

            <div style="border-style: solid;">
                <img class="icon" src="..\..\Pictures\Athlete.png" alt="calender">
                <p>Competitors</p>
                <br>

                <?php
                require_once '../../includes/database.php';
                $records = mysqli_query($conn, "SELECT Fname,Minit,Lname,Country FROM participation,athlete WHERE MatchID='$x' AND AthleteID=A_ID");  // Use select query here 
                {
                    if (!$records) {
                    } else {
                        while ($data = mysqli_fetch_array($records)) {
                            $fn = $data['Fname'];
                            $mn = $data['Minit'];
                            $ln = $data['Lname'];
                            $country = $data['Country'];
                            echo "<p class=\"icon\">$fn $mn $ln <strong>$country</strong></p>";
                        }
                    }
                }
                ?>
            </div>

            <div style="border-style: solid;">
                <img class="icon" src="..\..\Pictures\referee.png" alt="calender">
                <p>Referees</p>
                <br>
                <?php
                require_once '../../includes/database.php';
                $records = mysqli_query($conn, "SELECT Fname,Minit,Lname,Nationality FROM referee_matches,referee WHERE MatchID='$x' AND RefereeID=Referee_ID");  // Use select query here 
                {
                    if (!$records) {
                    } else {
                        while ($data = mysqli_fetch_array($records)) {
                            $fn = $data['Fname'];
                            $mn = $data['Minit'];
                            $ln = $data['Lname'];
                            $country = $data['Nationality'];
                            echo "<p class=\"icon\">$fn $mn $ln <strong>$country</strong></p>";
                        }
                    }
                }
                ?>
            </div>

            <div style="border-style: solid;">
                <p style="margin-left:20px;">Choose Ticket Type</p>
                <img class="icon" src="..\..\Pictures\ticketType.png" alt="calender">
                <input type="radio" name="tickettype" value="VIP" onclick="dispalyRadio()" checked class="item"> VIP <br>
                <input type="radio" name="tickettype" value="Premier" onclick="dispalyRadio()" class="item"> Premier <br>
                <input type="radio" name="tickettype" value="Economic" onclick="dispalyRadio()" class="item"> Economic <br>
            </div>

            <div style="border-style: solid;">
                <p style="margin-left:20px;">Choose Your Seat</p>
                <img class="icon" src="..\..\Pictures\seatnumber.png" alt="calender">
                <select name="selectedSeat" style="    margin-top: 10px;
    margin-left: 10px;
    margin-right: 10px;
    box-shadow: 0 0 2px #b7b7b7;
    background-color: #f2f2f2;
    width: 196px;
    height: 31px;
    border-radius: 12px;
    border: none;
    color: black;
    cursor: pointer;
    transition: 0.3s;
    letter-spacing: 1px;
    font-size: 12px;" class="selectclass">
                    <option disabled selected>-- Select Seat Number --</option>
                    <?php
                    require_once '../../includes/database.php';
                    $mid = $_SESSION['M_ID'];

                    $records = mysqli_query($conn, "SELECT Seat_Number FROM ticket WHERE M_ID='$mid' ORDER BY Seat_Number");  // Use select query here 
                    if (!$records) {
                    } else {
                        $data2 = array();
                        array_push($data2, 0); //so key of the second elemt will be 1 
                        //echo "Records selected successfully.";

                        while ($data = mysqli_fetch_array($records)) {

                            array_push($data2, $data['Seat_Number']);
                        }

                        for ($x = 1; $x <= 100; $x++) {
                            if (!array_search($x, $data2)) {
                                echo "<option value='" . $x . "'>" . $x . "</option>";
                            }
                        }
                    }
                    ?>
                </select>

            </div>



           <br><br><br>

            <!-- <div style=" text-align:center;"> -->
            </div>
                <div class="admon_H"><button type="submit" name="submit" style="width: 200px;" >Book</button> <br></div>


            <!-- </div> -->



      

    </form>

</body>

<script>
    //let input = document.querySelector(".item");
    let button = document.querySelector(".button");
    let sel = document.querySelector(".selectclass");
    button.disabled = true;
    //sel.disabled =true;
    //input.addEventListener("change", stateHandle);
    sel.addEventListener("change", stateHandle2);


    /*function stateHandle() {
        if (document.querySelector(".item").value === "") {
            button.disabled = true;
            sel.disabled =true;
        } else {
            sel.addEventListener("change", stateHandle2);
            sel.disabled =false;
        }
    }*/

    function stateHandle2() {
        if (document.querySelector(".selectclass").value === "") {
            button.disabled = true;
        } else {
            button.disabled = false;

        }
    }
</script>

</html>


<?php
require_once '..\footer_users.php';
?>