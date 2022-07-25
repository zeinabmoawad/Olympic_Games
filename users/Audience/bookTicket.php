<?php
require_once 'heading_Aud.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Tickets</title>
    <link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">

</head>

<body>
<br><br>
    <form action="Ticket.php" method="post" >
        <div class="grid-container">
            <?php
            require_once '../../includes/database.php';
            //string
            $sql = 'SELECT M_Name,M_ID,Venue_N,DateDay,S_Time FROM matche ORDER BY DateDay,S_Time';
            //Convert to query
            $stmt = mysqli_stmt_init($conn);
            //assign query to database
            $result = $conn->query($sql);
            //check if no of rows>0
            if ($result->num_rows > 0) {

                //fetch the results rows
                while ($row = $result->fetch_assoc()) {
                    echo "<div class=\"grid-inner\">
                   <div class=\"item1\">" . $row["M_Name"] . "</div>"
                        . "<div class=\"item2\"><img src=\"..\..\Pictures\stadium.png\" alt=\"Venue\"></div>"
                        . "<div class=\"item5\">" . $row["Venue_N"] . "</div>"
                        . "<div class=\"item3\"><img src=\"..\..\Pictures\calender.png\" alt=\"calender\"></div>"
                        . "<div class=\"item6\">" . $row["DateDay"] . "<br>" . $row["S_Time"] . "</div>"
                        . "<div class=\"item4\"> <button type=\submit\" name=\"sub\" value='" . $row["M_ID"] . "'>Book Ticket</button></div>"
                        . "</div>";
                }
            } else {
                echo "no results";
            }

            //we need to close the connection
            mysqli_close($conn);

            ?>
        </div>
        <form>
<br><br>
</body>
</html>

<?php
require_once '..\footer_users.php';
?>