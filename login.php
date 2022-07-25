<?php
require_once 'header_login.php'; 
echo '<link rel="stylesheet" type="text/css" href="includes/style.css">';
?> 

<br>
<br><br>
<div class="sign cards ">

    <h1>Log In!</h1>
    <p>no account??
        <a href="sign.php">Sign Up Now!</a>
    </p>
    <form action="includes/login-inc.php" method="post">
        <!-- <select name="user" id="">
             <option disabled selected>-- Select Your Gender --</option>
            <option name="sponsor">Sponsor</option>
            <option name="referee">Referee</option>
            <option name="athlete">Athlete</option>
            <option name="audience">Audience</option>
        </select> -->
        <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="username" placeholder= "UserName"style="margin: 10px auto;">
        <input type="password" name="pass" placeholder= "Password"style="margin: 10px auto;">
        <button type = "submit" name="submit">LOGIN</button>
    </form>

    <p>
        <a href="pass.php">change password?</a>
    </p>
</div>


<?php
require_once 'includes/footer.php'
?>