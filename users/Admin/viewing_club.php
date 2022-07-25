<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Club ID</th>
                    <th>Club Name</th>
                    <th>Location</th>
                </tr>";
    $sql = "SELECT * FROM club";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $id = $data['Club_ID'];
         $name = $data['Club_Name'];
         $loc = $data['Location'];
         
         
               echo "<tr>
                        <th>$id</th>
                        <th>$name</th>
                        <th>$loc</th>
                    </tr>";
                
    }
    echo "</table>";
?>