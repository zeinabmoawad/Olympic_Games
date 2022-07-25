<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Venue_Name</th>
                    <th>Capacity</th>
                    <th>City</th>
                </tr>";
    $sql = "SELECT * FROM venue";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $name = $data['Venue_Name'];
         $cap = $data['Capacity'];
         $city = $data['CityName'];
               echo "<tr>
                        <th>$name</th>
                        <th>$cap</th>
                        <th>$city</th>
                    </tr>";
                
    }
    echo "</table>";
?>