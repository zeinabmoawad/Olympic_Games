<?php
if (isset($_POST['submit'])) {
    require_once '../../includes/database.php';
    // session_start();
    $ref = $_POST['referee'];
    $mat = $_POST['match'];

    if (empty($ref) || empty($mat)) {
        header("Location: referee_match.php?error=emptyfields" . $ref . $mat);
        exit();
    } else {
        //check if this user naem is already used before
        $sql = "SELECT * FROM referee_matches WHERE RefereeID='$ref' AND MatchID='$mat'";
        $results = mysqli_query($conn, $sql);
        if ($data = mysqli_fetch_array($results)) {
            header("Location: referee_match.php?Already Exist");
            exit();
        } else {
            $sql = "SELECT * FROM referee,matche WHERE Referee_ID='$ref' AND M_ID='$mat' AND Msport_ID = Sp_ID";
            $results = mysqli_query($conn, $sql);
            if ($data = mysqli_fetch_array($results)) {
                //insert username and pass word
                $sql = "INSERT INTO referee_matches(RefereeID, MatchID) VALUES ('$ref', '$mat')";
                $results = mysqli_query($conn, $sql);
                if ($results)
                    header("Location: referee_match.php?success=inserted");
                else
                    header("Location: referee_match.php?ERROR2023" . $ref . $mat );
            } else {
                header("Location: referee_match.php?the referee dont judge this sport");
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

    $data = $_POST['referee2'];
    $arr=explode(" ",$data);
    //$ref = $data['Referee_ID'];
   // $mat = $_POST['M_ID'];
    if (empty($arr)) {
        header("Location: referee_match.php?ERROR Select To Delete" . $ref);
        exit();
    } else {

        $sql = "DELETE FROM referee_matches WHERE RefereeID='$arr[0]' AND MatchID='$arr[1]' ";
        $results = mysqli_query($conn, $sql);
        if ($results)
            header("Location: referee_match.php?success=Deleted");
        else
            header("Location: referee_match.php?ERROR");

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>