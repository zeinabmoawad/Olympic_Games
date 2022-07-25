<?php
require '../../includes/database.php';
if(isset($_POST['submit']))
{
    

    $name = $_POST['name'];
    $date = $_POST['start_date'];
    $sel = $_POST['gender'];
    $sport = $_POST['sport'];
    $club = $_POST['club'];
    

    if(empty($name)||empty($date)||empty($sel)||empty($sport)||empty($club))
    {
        header("Location: coach.php?error=emptyfields".$name);
        exit();
    } else {
        $sql = "SELECT * from coach";
        $results=mysqli_query($conn,$sql);
        $data2 = array();
        //array_push($data2, 0); 
        while ($data = mysqli_fetch_array($results))
        {
            array_push($data2, $data['Coach_ID']);
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

        $sql = "INSERT INTO coach (Coach_ID, Coach_Name, Gender, Clu_ID, Strt_Date, SPORTID) VALUES ('$id', '$name', '$sel', '$club', '$date', '$sport');";
        $results=mysqli_query($conn,$sql);

        if($results)
            header("Location: coach.php?success=inserted" );
        else 
            header("Location: coach.php?ERROR" );
        
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
}  

if(isset($_POST['submit2']))
{

    $id = $_POST['id'];
    $name = $_POST['name2'];
    $date = $_POST['start_date2'];
    $sel = $_POST['gender2'];
    $sport = $_POST['sport2'];
    $club = $_POST['club2'];
    

        $sql = "SELECT * from coach WHERE Coach_ID='$id'";
        $res = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($res);
            if(empty($name)) {
                $name = $data['Coach_Name'];
            }
            if(empty($date)) {
                $date = $data['Strt_Date'];
            }
            if(empty($sel)) {
                $sel = $data['Gender'];
            }
            if(empty($club)) {
                $club = $data['Clu_ID'];
            }
            if(empty($sport)) {
                $sport = $data['SPORTID'];
            }
        
        $sql = "UPDATE coach 
                    SET Coach_Name='$name', Strt_Date='$date', Gender='$sel', Clu_ID='$club', SPORTID='$sport'
                    WHERE Coach_ID='$id' ";
        $results=mysqli_query($conn,$sql);
        if($results)
            header("Location: coach.php?success=inserted" );
            
        else 
            header("Location: coach.php?ERROR" );
        
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} 



if(isset($_POST['submit3']))
{

    $id = $_POST['id2'];
        $sql = "DELETE FROM coach WHERE Coach_ID='$id' ";
        $results=mysqli_query($conn,$sql);

        if($results)
            header("Location: coach.php?success=inserted" );
        else 
            header("Location: coach.php?ERROR" );
        
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} 

?>