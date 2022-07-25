<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>City Name</th>
                    <th>Near Airport</th>
                </tr>";
    $sql = "SELECT * FROM city";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $name = $data['City_Name'];
         $airport = $data['Near_Airport'];
         
         
               echo "<tr>
                        <th>$name</th>
                        <th>$airport</th>
                    </tr>";
                
    }
    echo "</table>";
?>