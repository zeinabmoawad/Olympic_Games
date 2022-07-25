<?php
require '../../includes/database.php';
?>

<?php
if(isset($_POST['submit_admin']))
{
    $fname=$_POST['name'];
    if(empty($fname))
    {
        header("Location: add_admin.php?error=emptyfields".$fname );
        exit();
    }
    else{
        $results = mysqli_query($conn, "CALL getusers('$fname')");
        if ($data = mysqli_fetch_array($results)) {
            header("Location: add_admin.php?Used UserName");
            exit();
        } else {
        if(mysqli_next_result($conn)) {
            $sql = "INSERT INTO users (user_name, password, type) VALUES ('$fname', '$2y$10\$Gb3thROPBFa5qK5l7ahXSOmsmwu/OXq/C.RCIkgJ6iyFPWzp5OvJm', 'admin');";
            $results=mysqli_query($conn,$sql);
                if($results)
                header("Location: add_admin.php?success=inserted" );
                else 
                header("Location: add_admin.php?ERROR" );

        }
    }
}

    


}

?>