<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Match ID</th>
                    <th>Match Name</th>
                    <th>Date Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Venue Name</th>
                    <th>Sport</th>
                </tr>";
    $sql = "SELECT * FROM matche";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $id = $data['M_ID'];
         $name = $data['M_Name'];
         $date = $data['DateDay'];
         $start = $data['S_Time'];
         $end = $data['E_Time'];
         $ven = $data['Venue_N'];
         $sport = $data['Msport_ID'];
         
         
         $sql1 = "SELECT Sport_Name FROM sport WHERE Sport_ID =$sport";
         $results1=mysqli_query($conn,$sql1);
         while ($data1 = mysqli_fetch_array($results1))
         {
             $sportname = $data1["Sport_Name"];
         }
         
               echo "<tr>
                        <th>$id</th>
                        <th>$name</th>
                        <th>$date</th>
                        <th>$start</th>
                        <th>$end</th>
                        <th>$ven</th>
                        <th>$sportname</th>
                    </tr>";
                
    }
    echo "</table>";
?>