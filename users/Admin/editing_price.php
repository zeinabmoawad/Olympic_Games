<?php
            require_once '../../includes/database.php';
require_once 'heading_adm.php';
require_once 'editing_price_back.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>

<br><br>
<form class="editM edit" method="post">  

<?php
echo "
                <br></br>
                <table style=\"width:70%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Type of Ticket</th>
                    <th>Price</th>
                </tr>";
    $sql = "SELECT * FROM price ";
    $res=mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($res);
        $type = $data['Type'];
         $price = $data['Price'];
               echo "<tr style=\"height: 35px;\">
                        <th>$type</th>
                        <th><form><input type=\"text\" name=\"price1\" style=\" width: 250px; border: none; \" placeholder=\"$price\"></th>
                    </tr>";
    $data = mysqli_fetch_array($res);
        $type = $data['Type'];
         $price = $data['Price'];
               echo "<tr style=\"height: 35px;\">
                        <th>$type</th>
                        <th><input type=\"text\" name=\"price2\" style=\" width: 250px; border: none; \" placeholder=\"$price\"></th>
                    </tr>";
    $data = mysqli_fetch_array($res);
        $type = $data['Type'];
         $price = $data['Price'];
               echo "<tr style=\"height: 35px;\">
                        <th>$type</th>
                        <th><input type=\"text\" name=\"price3\" style=\" width: 250px; border: none; \" placeholder=\"$price\"></th>
                    </tr>";
    echo "</table><br><br>";

    echo '<button type = "submit" name="submit">Edit</button>';
?>

<?php
 require_once '../../includes/footer.php';
?>