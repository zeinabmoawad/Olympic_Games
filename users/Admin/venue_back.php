<?php
    require_once '../../includes/database.php';
if (isset($_POST['AddVenue'])) {

    // session_start();
    $fname = $_POST['FName'];
    $cap = $_POST['Cap'];
    $city= $_POST['City'];
   


    if (empty($fname) || empty($cap) || empty($city)) {
        header("Location: venue.php?error=emptyfields" . $fname . $cap . $city);
        exit();
    } else {
        //check if this user naem is already used before
        $sql = "SELECT * FROM venue WHERE Venue_Name='$fname'";
        $results = mysqli_query($conn, $sql);
        if ($data = mysqli_fetch_array($results)) {
            header("Location: venue.php?Used Venue_Name");
            exit();
        } else {

            //insert username and pass word
            $sql = "INSERT INTO venue(Venue_Name,Capacity, venue.CityName) VALUES ('$fname', $cap, '$city')";
            $results = mysqli_query($conn, $sql);
            if ($results)
                header("Location: venue.php?success=inserted");
            else
                header("Location: venue.php?ERROR .$fname .$cap.$city");
        }

       
    }
   // mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
}
?>
<?php
if (isset($_POST['submit2'])) {
    require_once '../../includes/database.php';

    $id = $_POST['id2'];
    $fname = $_POST['cap'];
    $minit = $_POST['City'];
    if (empty($id)) {
        header("Location: venue.php?ERROR Select A Vaneue" . $id);
        exit();
    } else {

        $sql = "SELECT * from venue WHERE Venue_Name='$id'";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            header("Location: venue.php?INCORRECTQUER" . $id);
        } else {

            $data = mysqli_fetch_array($res);
            $olduser = $data['Venue_Name'];
            if (empty($fname)) {
                $fname = $data['Capacity'];
            }
            if (empty($minit)) {
                $minit = $data['CityName'];
            }

            $sql = "UPDATE venue SET Capacity=$fname ,CityName='$minit' WHERE Venue_Name='$id'";
            $results = mysqli_query($conn, $sql);
            if ($results)
                header("Location: venue.php?success=Updated");
            else
                header("Location: venue.php?ERROR333");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}

?>

<?php
if (isset($_POST['submit3'])) {

    require_once '../../includes/database.php';
    $id = $_POST['id3'];
    if (empty($id)) {
        header("Location: venue.php?ERROR Select A venue" . $id);
        exit();
    } else {
     


         $sql = "DELETE FROM venue WHERE Venue_Name='$id' ";
        $results = mysqli_query($conn, $sql);

        if ($results)
            header("Location: venue.php?success=Deleted");
        else
            header("Location: venue.php?Error");

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>