<?php

require_once 'heading_Aud.php';
//session_start();
//$data = $_SESSION['sessionUser'];
// echo $data;
echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
echo ' <link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background: url('../../Pictures\olympics23.jpg') no-repeat center center/cover;
height:100%;">
    <br><br>
    <h1 style="text-align:center; color:green;">Welcome to The Olympic Tournement</h1>
    <?php
     require_once '../../includes/database.php';
     session_start();
     $usename=$_SESSION['sessionUser'];
     $sql = "SELECT  SSN,audience.Name, Gender, Covid19_Test FROM audience WHERE username= '$usename'";
     $results=mysqli_query($conn,$sql);
     while ($data = mysqli_fetch_array($results)) {
         $Name=$data['Name'];
         $G=$data['Gender'];
         $test=$data['Covid19_Test'];
         $ssn=$data['SSN'];
         if($test==0)
            $test="Negative";
        else $test="Positive";

        if($G=='F')
         $G="Female";
         else
         $G="Male";
     }
    
    echo" <div class=\"class1\">
        <div></div>
     <div>
         <p>Name: $Name</p>
         <p>SSN: $ssn</p>
         <p>Gender: $G</p>
         <p>Covid-Test: $test</p>
         <p>User_Name: $usename</p>   
     </div>
     </div>";

     echo "<br><br><br>";
  
    ?>
  


    <div>
    <div class="view">
        <div>Athletes</div>
        <div>Countries</div>
        <div>Referees</div>
        <div>Sports</div>
        
        <?php
         require_once '../../includes/database.php';
         $sql = "SELECT * FROM sport";
         $result=mysqli_query($conn,$sql);
         $count1= mysqli_num_rows($result);
          
         $sql2 = "SELECT * FROM athlete";
         $result2=mysqli_query($conn,$sql2);
         $count2= mysqli_num_rows($result2);
     
         $sql3 = "SELECT Distinct(Country) FROM athlete";
         $result3=mysqli_query($conn,$sql3);
         $count3= mysqli_num_rows($result3);

         $sql4 = "SELECT * FROM referee";
         $result4=mysqli_query($conn,$sql4);
         $count4= mysqli_num_rows($result4);



        echo"<div class=\"items\"><div class=\"center\">$count2</div></div>
        <div class=\"items\"><div class=\"center\">$count3</div></div>
        <div class=\"items\"><div class=\"center\">$count4</div></div>
        <div class=\"items\"><div class=\"center\">$count1</div></div>";
        ?>
    </div>
 </body>

</html>

<?php
require_once '..\footer_users.php';
?>