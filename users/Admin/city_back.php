<?php
require '../../includes/database.php';
if(isset($_POST['submit']))
{
    

    $name = $_POST['name'];
    $air = $_POST['air'];

    if(empty($name)||empty($air))
    {
        header("Location: city.php?error=emptyfields".$name.$air);
        exit();
    } else {
        $sql = "SELECT * FROM city WHERE City_Name='$name'";
        $results = mysqli_query($conn, $sql);
        if ($data = mysqli_fetch_array($results)) {
            header("Location: city.php?Used cityName");
            exit();
        }

        $sql = "INSERT INTO city (City_Name, Near_Airport) VALUES ('$name', '$air');";
        $results=mysqli_query($conn,$sql);

        if($results)
            header("Location: city.php?success=inserted" );
        else 
            header("Location: city.php?ERROR" );
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
}  

if(isset($_POST['submit2']))
{
    $name = $_POST['name2'];
    $air = $_POST['air2'];
        if(!empty($name))
        {
            $sql = "SELECT * from city WHERE City_Name='$name'";
            $res = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($res);
                
                if(empty($air)) {
                    $air = $data['Near_Airport'];
                }
            
            $sql = "UPDATE city 
                        SET  Near_Airport = '$air'
                            
                        WHERE City_Name='$name' ";
            $results=mysqli_query($conn,$sql);
            if($results)
                header("Location: city.php?success=updated".$name.$air );
                
            else {
                header("Location: city.php?ERROR" );
                
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            exit();

        } else {
            header("Location: city.php?error=empty fileds2");
        }
} 



if(isset($_POST['submit3']))
{
    $name = $_POST['name3'];
    if(!empty($name))
    {
   

        $sql = "DELETE FROM city WHERE City_Name='$name' ";
        $results=mysqli_query($conn,$sql);

      
        if($results)
            header("Location: city.php?success=inserted" );
        else 
            header("Location: city.php?ERROR" );
        
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
    } else {
        header("Location: city.php?error=empty fileds2");
    }
} 

?>