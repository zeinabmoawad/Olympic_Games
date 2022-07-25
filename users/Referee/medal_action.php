<?php

if (isset($_POST['submit'])) {
    require_once '../../includes/database.php';
    require_once 'referee_header.php';
    echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';

    echo "
    <html>
    <head>
    <style>
    body{
    background: url('../../Pictures/winner-hand-raised-holding-two-gold-medals_4236-298.jpg') no-repeat center center/cover;
    height=100%;
    }
    </style>
    </head>
    </html>
    ";
    $fname = $_POST['mid'];
    if (empty($fname)) {
        header("Location: Assign_Medal.php?error=emptyfields");
        exit();
    } else {
        // $name = $_POST['mid'];
        $sql = "SELECT Sport_ID FROM Sport WHERE Sport.Sport_ID=$fname";
        $results2 = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($results2)) {
            $mid = $data['Sport_ID'];
            //echo $mid;
        }

        // session_start();
        //$_SESSION['MID'] = $mid;
        $sqls = "SELECT A_ID, athlete.Rank FROM athlete WHERE SportID=$mid ORDER BY athlete.Rank DESC";

        $resultse = mysqli_query($conn, $sqls);
        $i = 0;

        $date_today_formatted = date("Y-m-d");
        while ($data2 = mysqli_fetch_array($resultse)) {
            echo $i;
            if ($i == 0)
                $type = "Gold";

            else if ($i == 1)
                $type = "Silver";

            else if ($i == 2)
                $type = "Bronze";
            else
                break;

            $id = $data2['A_ID'];
            echo $id;
            $sql6 = "UPDATE medal SET Winner_ID=$id,Winning_Date='$date_today_formatted' WHERE medal.Type='$type' AND medal.sport_id= $fname";
            $results = mysqli_query($conn, $sql6);
            $i = $i + 1;
                if (!$results) {
                    header("Location: Assign_Medal.php?error.$id.$date_today_formatted.$type.$fname");
                    exit();
                }

            }
            header("Location: Assign_Medal.php?success");
            exit();
        }
    }

?>