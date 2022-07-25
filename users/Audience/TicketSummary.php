<?php
if (isset($_POST['submit'])) {
    require_once 'heading_Aud.php';
} else {
    header("Location:audience.php");
    exit();
}
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Summary</title>
    <link rel="stylesheet" type="text/css" href="..\..\includes\TicketStyling.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</head>

<body>
    <?php
    //to make this code run only if the button clicked from Ticket.php to not gret error
    if (isset($_POST['submit'])) {
        //includeing database
        require_once '../../includes/database.php';
        //complete previous session
        session_start();
        //echo $_SESSION['M_ID'];
        $date = date("Y/m/d");
        $radioVal = $_POST["tickettype"]; //value choosen from radio button
        $selectedSeat_no = $_POST['selectedSeat'];
        //getting price
        $sql = "SELECT Price FROM price WHERE Type ='$radioVal'";
       $results=mysqli_query($conn,$sql);
       while ($data = mysqli_fetch_array($results)) {
           $price= $data['Price'];
       }
        $mNo = $_SESSION['M_ID'];
       $username = $_SESSION['sessionUser'];
       $sql = "SELECT * FROM audience WHERE username ='$username'";
       $results=mysqli_query($conn,$sql);
       while ($data = mysqli_fetch_array($results)) {
           $ssn = $data['SSN'];
       }
       //getting id
       $sql = "SELECT * from ticket";
            $results=mysqli_query($conn,$sql);
            $data2 = array();
            //array_push($data2, 0); 
            while ($data = mysqli_fetch_array($results))
            {
                array_push($data2, $data['ID']);
            }
            if (!empty($data2)) {
                $new_arr = range(1,max($data2));                                                    
            // use array_diff to find the missing elements 
            $arr = array_diff($new_arr, $data2);
            
            if(empty($arr))
                $id = max($data2) +1;
            else
                $id = min($arr);
            
            }else $id = 1;
        $sql = "INSERT INTO ticket (`ID`,`Type`,`Seat_Number`,`Audience_SSN`, `Booking_Date`, `M_ID`) VALUES ($id,'$radioVal','$selectedSeat_no','$ssn','$date','$mNo')";
        $stmt = mysqli_stmt_init($conn);
        //check if the query is right
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "incoreect query";
            exit();
        } else {
            mysqli_stmt_execute($stmt);
            // print that it is suceesed
            echo "<H1 style=\"text-align:center;color:green;\">Your Ticket is booked Sucessfully</H1>";
            $records = mysqli_query($conn, "SELECT ID,DateDay,S_Time,Venue_N,CityName FROM ticket as x,matche as y,venue WHERE x.M_ID=y.M_ID AND Venue_N=Venue_Name AND x.M_ID=$mNo AND Seat_Number=$selectedSeat_no ");
            if (!$records) {
            } else {

               
                echo "<table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>TicketID</th>
                    <th>Type</th>
                    <th>SeatNO.</th>
                    <th>Booking Date</th>
                    <th>Venue</th>
                    <th>City</th>
                    <th>Match Date</th>
                    <th>Start Time</th>
                </tr>";
                while ($data = mysqli_fetch_array($records)) {
                    $id = $data['ID'];
                    $i2 = $data['DateDay'];
                    $i3 = $data['S_Time'];
                    $i4 = $data['Venue_N'];
                    $i5 = $data['CityName'];

                    echo "<tr>
                        <th>$id</th>
                        <th>$radioVal</th>
                        <th>$selectedSeat_no</th>
                        <th>$date</th>
                        <th>$i4</th>
                        <th>$i5</th>
                        <th>$i2</th>
                        <th>$i3</th>
                    </tr>
                </table>";
                }
               
            }
            echo"<div style=\"margin: 40px;\">
            <img class=\"icon\" src=\"..\..\Pictures\price.png\" alt=\"calender\">
            <div style=\"  font-weight: bold;\">Price:</div>
            <div>$price LE</div>
            </div>";

           


            echo"<div style=\"border-style: solid;\
            \text-align: center;\
            \height: 52px;\
            \margin-right: 500;\
            \margin-left: 500;\
            \box-sizing: border-box;\">
            <img class=\"icon\" src=\"../../Pictures/432312_11zon.png\" alt=\"calenuuuder\">
            <p ><mark>Please save TicketID you will need it to pay for the ticket at the venue</mark></p>
        </div>";
     
        }




        //we need to close the connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    ?>

</body>

</html>
<?php
require_once '..\footer_users.php';
?>