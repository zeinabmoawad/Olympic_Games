<?php
require_once 'header_login.php';
echo '<link rel="stylesheet" type="text/css" href="includes/style.css">';
?>



<div class="sign cards">
    
    <h1>Sign UP!</h1>
    <p>Already have an account?
        <a href="login.php">Log In!</a>
    </p>

    <form action="includes/sign-inc.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="number" name="ssn" placeholder="SSN">
        <select name="gender" id="">
            <option disabled selected>-- Select Your Gender --</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <select name="covid" id="">
            <option disabled selected>-- Select Your Covid Test Result --</option>
            <option value="1">Positive</option>
            <option value="0">Negative</option>
        </select>
        <input type="text" pattern="[A-Za-z0-9_]+" title="Insert letters or numbers or _ without spaces" name="username" placeholder="UserName">
        <input type="password" name="pass" placeholder="Password">
        <input type="password" name="confirmpass" placeholder="Confirm Password">



        <button type="submit" name="submit">Sign Up</button>
    </form>
</div>


<?php
require_once 'includes/footer.php'
?>