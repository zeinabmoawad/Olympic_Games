<?php
require '../../includes/database.php';
if(isset($_POST['submit']))
{
    

    $name = $_POST['name'];
    $loc = $_POST['loc'];

    if(empty($name)||empty($loc))
    {
        header("Location: club.php?error=emptyfields".$name.$loc);
        exit();
    } else {
        $sql = "SELECT * from club";
        $results=mysqli_query($conn,$sql);
        $data2 = array();
        //array_push($data2, 0); 
        while ($data = mysqli_fetch_array($results))
        {
            array_push($data2, $data['Club_ID']);
        }
        if(!empty($data2)) {
        $new_arr = range(1,max($data2));                                                    
        // use array_diff to find the missing elements 
        $arr = array_diff($new_arr, $data2);
        

        if(empty($arr))
            $id = max($data2) +1;
        else
            $id = min($arr);
        } else $id = 1;

        $sql = "INSERT INTO club (Club_ID, Club_Name, Location) VALUES ('$id', '$name', '$loc');";
        $results=mysqli_query($conn,$sql);

        if($results)
            header("Location: club.php?success=inserted" );
        else 
            header("Location: club.php?ERROR" );
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}  

if(isset($_POST['submit2']))
{

    $id = $_POST['id'];
    $name = $_POST['name2'];
    $loc = $_POST['loc2'];

        $sql = "SELECT * from club WHERE Club_ID='$id'";
        $res = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($res);
            if(empty($name)) {
                $name = $data['Club_Name'];
            }
            if(empty($loc)) {
                $loc = $data['Location'];
            }
        
        $sql = "UPDATE club 
                    SET Club_Name='$name', Location='$loc'
                        
                    WHERE Club_ID='$id' ";
        $results=mysqli_query($conn,$sql);
        if($results)
            header("Location: club.php?success=inserted$loc" );
            
        else 
            header("Location: club.php?ERROR" );
        exit();
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 



if(isset($_POST['submit3']))
{

    $id = $_POST['id2'];

        $sql = "DELETE FROM club WHERE Club_ID='$id' ";
        $results=mysqli_query($conn,$sql);

      
        if($results)
            header("Location: club.php?success=inserted" );
        else 
            header("Location: club.php?ERROR" );
        exit();
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 

?>