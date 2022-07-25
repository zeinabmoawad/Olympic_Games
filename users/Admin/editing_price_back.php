<?php
if (isset($_POST['submit'])) {
    require_once '../../includes/database.php';
    // session_start();
    $first = $_POST['price1'];
    $second = $_POST['price2'];
    $third = $_POST['price3'];

    if (empty($first) && empty($second) && empty($third)) {
        header("Location: editing_price.php?error=emptyfields" . $first . $second);
        exit();
    } else {
        //check if this user naem is already used before
        $sql = "SELECT * FROM price";
        $results = mysqli_query($conn, $sql);

        $data = mysqli_fetch_array($results);
        $old1 = $data['Price'];
        $data = mysqli_fetch_array($results);
        $old2 = $data['Price'];
        $data = mysqli_fetch_array($results);
        $old3 = $data['Price'];

        if(empty($first))
            $first = $old1;
        if(empty($second))
            $second = $old2;
        if(empty($third))
            $third = $old3;

            //insert username and pass word
            $sql = "UPDATE price SET Price='$first' WHERE price.Type='Economic'";
            $results = mysqli_query($conn, $sql);
            $sql = "UPDATE price SET Price='$second' WHERE price.Type='Premier'";
            $results = mysqli_query($conn, $sql);
            $sql = "UPDATE price SET Price='$third' WHERE price.Type='VIP'";
            $results = mysqli_query($conn, $sql);

            if ($results)
                header("Location: editing_price.php?success=UPDATED");
            else
                header("Location: editing_price.php?ERROR2023" . $first . $second );
        

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit();
    }
}
?>