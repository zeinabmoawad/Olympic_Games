<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Coach ID</th>
                    <th>Coach Name</th>
                    <th>Gender</th>
                    <th>Club</th>
                    <th>Start Date</th>
                    <th>Sport</th>
                </tr>";
    $sql = "SELECT * FROM coach";
    $res=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($res))
    {
        $id = $data['Coach_ID'];
         $name = $data['Coach_Name'];
         $gender = $data['Gender'];
         $club = $data['Clu_ID'];
         $start = $data['Strt_Date'];
         $sport = $data['SPORTID'];
         
         $sql1 = "SELECT * FROM club WHERE Club_ID =$club";
         $results1=mysqli_query($conn,$sql1);
         while ($data1 = mysqli_fetch_array($results1))
         {
             $clubname = $data1["Club_Name"];
         }

         $sql2 = "SELECT * FROM sport WHERE Sport_ID =$sport";
         $results2=mysqli_query($conn,$sql2);
         while ($data2 = mysqli_fetch_array($results2))
         {
             $sportname = $data2["Sport_Name"];
         }
         
               echo "<tr>
                        <th>$id</th>
                        <th>$name</th>
                        <th>$gender</th>
                        <th>$clubname</th>
                        <th>$start</th>
                        <th>$sportname</th>
                        
                    </tr>";
                
    }
    echo "</table>";
?>