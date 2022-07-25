<?php
if (isset($_POST['submit'])) {
    require_once '../../includes/database.php';
    // session_start();
    $ath = $_POST['athlete'];
    $mat = $_POST['match'];

    if (empty($ath) || empty($mat)) {
        header("Location: participation.php?error=emptyfields" . $ath . $mat);
        exit();
    } else {
        //check if this user naem is already used before
        $sql = "SELECT * FROM participation WHERE AthleteID='$ath' AND MatchID='$mat'";
        $results = mysqli_query($conn, $sql);
        if ($data = mysqli_fetch_array($results)) {
            header("Location: participation.php?Already Exist");
            exit();
        } else {
            $sql = "SELECT * FROM athlete,matche WHERE A_ID='$ath' AND M_ID='$mat' AND Msport_ID = SportID";
            $results = mysqli_query($conn, $sql);
            if ($data = mysqli_fetch_array($results)) {
                //insert username and pass word
            $sql = "INSERT INTO participation(AthleteID, MatchID) VALUES ('$ath', '$mat')";
            $results = mysqli_query($conn, $sql);
            if ($results)
                header("Location: participation.php?success=inserted");
            else
                header("Location: participation.php?ERROR2023" . $ath . $mat );
            } else {
            header("Location: participation.php?the athlete dont play this sport");
            exit();
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>
<?php
if (isset($_POST['submit2'])) {
    require_once '../../includes/database.php';

    $arr2 = $_POST['athlete2'];
    $ath=explode(" ",$arr2);
    if (empty($ath)) {
        header("Location: participation.php?ERROR Select To Delete" . $ath);
        exit();
    } else {

        $sql = "DELETE FROM participation WHERE AthleteID='$ath[0]' AND MatchID='$ath[1]' ";
        $results = mysqli_query($conn, $sql);
        if ($results)
            header("Location: participation.php?success=Deleted");
        else
            header("Location: participation.php?ERROR");

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>