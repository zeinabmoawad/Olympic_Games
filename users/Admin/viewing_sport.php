<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Sport ID</th>
                    <th>Sport Name</th>
                    <th>Season</th>
                </tr>";
    $sql = "SELECT * FROM sport";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $id = $data['Sport_ID'];
         $name = $data['Sport_Name'];
         $season = $data['Season'];
         
         
               echo "<tr>
                        <th>$id</th>
                        <th>$name</th>
                        <th>$season</th>
                    </tr>";
                
    }
    echo "</table>";
?>