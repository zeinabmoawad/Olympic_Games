<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">
    
</head>
<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Name</th>
                    <th>Athlete ID</th>
                    <th>Age</th>
                    <th>Country</th>
                    <th>Weight</th>
                    <th>Rank</th>
                    <th>Warning</th>
                    <th>Gender</th>
                    <th>Start Date</th>
                    <th>Sport Name</th>
                    <th>Club Name </th>
                </tr>";
    $sql = "SELECT * FROM athlete";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $id = $data['A_ID'];
         $i4 = $data['Gender'];
         $i5 = $data['Age'];
         $i6 = $data['Country'];
         $i7 = $data['Weight'];
         $i8 = $data['Rank'];
         $i9 = $data['Warnings'];
         $i10 = $data['ClubID'];
         $i11 = $data['SportID'];
         $i12 = $data['Strt_Date'];
         $clubname="";
         $sportname="";
         $MName4 = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
         $sql1 = "SELECT Club_Name FROM club WHERE Club_ID =$i10";
         $results1=mysqli_query($conn,$sql1);
         while ($data1 = mysqli_fetch_array($results1))
         {
             $clubname=$data1["Club_Name"];
         }
         $sql2 = "SELECT Sport_Name FROM sport WHERE Sport_ID =$i11";
         $results2=mysqli_query($conn,$sql2);
         while ($data2 = mysqli_fetch_array($results2))
         {
             $sportname=$data2["Sport_Name"];
         }
               echo "<tr>
                        <th>$MName4</th>
                        <th>$id</th>
                        <th>$i5</th>
                        <th>$i6</th>
                        <th>$i7</th>
                        <th>$i8</th>
                        <th>$i9</th>
                        <th>$i4</th>
                        <th>$i12</th>
                        <th>$sportname</th>
                        <th>$clubname</th>

                    </tr>";
                
    }
    echo "</table>";
?>