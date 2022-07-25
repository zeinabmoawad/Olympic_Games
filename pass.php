<?php
require_once 'header_login.php';
echo '<link rel="stylesheet" type="text/css" href="includes/style.css">';
?>
<br><br><br>
<br><br>
    <div class="sign cards edit editM" >
<form action="includes/pass-inc.php" method="post">
        <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="username" placeholder= "UserName" style="margin: 10px auto;">
        <input type="password" name="opass" placeholder= "Old Password" style="margin: 10px auto;">
        <input type="password" name="pass" placeholder= "Password" style="margin: 10px auto;">
        <input type="password" name="cpass" placeholder= "Confirm Password" style="margin: 10px auto;">
        <button type = "submit" name="submit">change</button>
    </form>


</div>


<?php
require_once 'includes/footer.php';
?>