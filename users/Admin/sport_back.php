<?php
require '../../includes/database.php';
if(isset($_POST['submit']))
{
    

    $name = $_POST['name'];
    $season = $_POST['season'];

    if(empty($name)||empty($season))
    {
        header("Location: sport.php?error=emptyfields".$name.$season);
        exit();
    } else {
        $sql = "SELECT * from sport";
        $results=mysqli_query($conn,$sql);
        $data2 = array();
        //array_push($data2, 0); 
        while ($data = mysqli_fetch_array($results))
        {
            array_push($data2, $data['Sport_ID']);
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

        $sql = "INSERT INTO sport (Sport_ID, Sport_Name, Season) VALUES ('$id', '$name', '$season');";
        $results=mysqli_query($conn,$sql);


        if($results)
            header("Location: sport.php?success=inserted" );
        else 
        {
            header("Location: sport.php?ERROR" );
        }

        $sql = "INSERT INTO medal (Sport_Id, Type) VALUES ('$id', 'Gold');";
        $results=mysqli_query($conn,$sql);
        $sql = "INSERT INTO medal (Sport_Id, Type) VALUES ('$id', 'Bronze');";
        $results=mysqli_query($conn,$sql);
        $sql = "INSERT INTO medal (Sport_Id, Type) VALUES ('$id', 'Silver');";
        $results=mysqli_query($conn,$sql);

        if($results)
            header("Location: sport.php?success=inserted" );
        else 
        {
            header("Location: sport.php?ERROR" );
        }
    

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
}  

if(isset($_POST['submit2']))
{

    $id = $_POST['id'];
    $name = $_POST['name2'];
    $season = $_POST['season2'];

        $sql = "SELECT * from sport WHERE Sport_ID='$id'";
        $res = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($res);
            if(empty($name)) {
                $name = $data['Sport_Name'];
            }
            if(empty($season)) {
                $season = $data['Season'];
            }
        
        $sql = "UPDATE sport 
                    SET Sport_Name='$name', Season='$season'
                        
                    WHERE Sport_ID='$id' ";
        $results=mysqli_query($conn,$sql);
        if($results)
            header("Location: sport.php?success=inserted$sport" );
            
        else 
            header("Location: sport.php?ERROR" );

    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} 



if(isset($_POST['submit3']))
{

    $id = $_POST['id2'];

        $sql = "DELETE FROM sport WHERE Sport_ID='$id' ";
        $results=mysqli_query($conn,$sql);

      
        if($results)
            header("Location: sport.php?success=inserted" );
        else 
            header("Location: sport.php?ERROR" );

    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} 

?>