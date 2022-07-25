<?php
require_once 'heading_adm.php';
require '../../includes/database.php';
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
?>
<br><br><br><br><br>


<form class="editM edit" method="post" action="add_admin_back.php">
    <div class="cards"><p>insert new admin</p><br>
    <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="name" placeholder="User Name">
    <button type = "submit" name="submit_admin">Insert</button></div>;
    <br><br><br>
    </form>

<div class = "admon"><img style="width: 300px" src="../../Pictures/pngwing.png" alt="" ><div>

<?php
require_once '../footer_users.php';
?>