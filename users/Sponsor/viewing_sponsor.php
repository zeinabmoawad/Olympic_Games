<?php
require_once '../../includes/database.php';

echo "
<br></br>
<table style=\"width:95%;\">
<tr style=\"background-color: moccasin;\">
    <th>Company</th>
    <th>Product</th>
    <th>Nationality</th>
</tr>";
$sql = "SELECT * FROM sponsor";
$results=mysqli_query($conn,$sql);
while ($data = mysqli_fetch_array($results))
{
$id = $data['Company'];
$i4 = $data['Product'];
$i5 = $data['Nationality'];
echo "<tr>
        <th>$id</th>
        <th>$i4</th>
        <th>$i5</th>
    </tr>";

}
echo "</table>";
?>