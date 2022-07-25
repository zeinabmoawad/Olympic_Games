<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Name</th>
                    <th>Referee ID</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Sport Name</th>
                    <th>Rate</th>
                </tr>";
    $sql = "SELECT * FROM referee";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $id = $data['Referee_ID'];
         $g = $data['Gender'];
         $n = $data['Nationality'];
         $r = $data['Rate'];
         $i11 = $data['Sp_ID'];
         $sportname="";
         $MName4 = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
         //sport name
         $sql2 = "SELECT Sport_Name FROM sport WHERE Sport_ID =$i11";
         $results2=mysqli_query($conn,$sql2);
         while ($data2 = mysqli_fetch_array($results2))
         {
             $sportname=$data2["Sport_Name"];
         }
               echo "<tr>
                        <th>$MName4</th>
                        <th>$id</th>
                        <th>$g</th>
                        <th>$n</th>
                        <th>$sportname</th>
                        <th>$r</th>
                    </tr>";
                
    }
    echo "</table>";
?>