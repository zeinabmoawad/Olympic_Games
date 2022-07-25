<?php
require '../../includes/database.php';
if(isset($_POST['submit']))
{
    

    $name = $_POST['name'];
    $ven = $_POST['venue'];
    
    $date = $_POST['date-day'];
    $stime = $_POST['start'];
    $etime = $_POST['end'];
    $sport = $_POST['sport'];
    

    if(empty($name)||empty($ven)||empty($date)||empty($stime)||empty($etime)||empty($sport))
    {
        header("Location: match.php?error=emptyfields".$name.$ven);
        exit();
    } else {
        $sql = "SELECT * from matche";
        $results=mysqli_query($conn,$sql);
        $data2 = array();
        //array_push($data2, 0); 
        while ($data = mysqli_fetch_array($results))
        {
            array_push($data2, $data['M_ID']);
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

        $sql = "INSERT INTO matche (M_ID, M_Name, DateDay, S_Time, E_Time, Venue_N, Msport_ID) VALUES ('$id', '$name', '$date', '$stime', '$etime', '$ven', '$sport');";
        $results=mysqli_query($conn,$sql);

        if($results)
            header("Location: match.php?success=inserted" );
        else 
        header("Location: match.php?Used Match Name Before" );
        
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
}  

if(isset($_POST['submit2']))
{

    $id = $_POST['id'];
    $name = $_POST['name2'];
    $ven = $_POST['venue2'];
    
    $date = $_POST['date-day2'];
    $stime = $_POST['start2'];
    $etime = $_POST['end2'];
    $sport = $_POST['sport2'];

        $sql = "SELECT * from matche WHERE M_ID='$id'";
        $res = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($res);
            if(empty($name)) {
                $name = $data['M_Name'];
            }
            if(empty($ven)) {
                $ven = $data['Venue_N'];
            }
            if(empty($date)) {
                $date = $data['DateDay'];
            }
            if(empty($stime)) {
                $stime = $data['S_Time'];
            }
            if(empty($etime)) {
                $etime = $data['E_Time'];
            }
            if(empty($sport)) {
                $sport = $data['Msport_ID'];
            }
        
        $sql = "UPDATE matche 
                    SET M_Name='$name', DateDay='$date', S_Time='$stime', E_Time='$etime', Venue_N='$ven', Msport_ID='$sport'
                        
                    WHERE M_ID='$id' ";
        $results=mysqli_query($conn,$sql);
        if($results)
            header("Location: match.php?success=inserted$ven" );
            
        else 
            header("Location: match.php?ERROR" );
        
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} 



if(isset($_POST['submit3']))
{

    $id = $_POST['id2'];
    

        

        $sql = "DELETE FROM matche WHERE M_ID='$id' ";
        $results=mysqli_query($conn,$sql);

        // $sql = "DELETE FROM athlete WHERE A_ID='$id' ";
        // $results=mysqli_query($conn,$sql);
        if($results)
            header("Location: match.php?success=inserted" );
        else 
            header("Location: match.php?ERROR" );
        
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} 

?>