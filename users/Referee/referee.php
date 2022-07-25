<?php
require_once '../../includes/database.php';
require_once 'referee_header.php';
?>
<?php
    session_start();
    $username = $_SESSION['sessionUser'];
   $sql = "SELECT * FROM referee WHERE username ='$username'";
   $results=mysqli_query($conn,$sql);
   while ($data = mysqli_fetch_array($results))
   {
       $id = $data['Referee_ID'];
        $i4 = $data['Gender'];
        $i5 = $data['Nationality'];
        $i6 = $data['Rate'];
        $i7 = $data['Sp_ID'];
        $sportname="";
        $MName4 = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
        $sql2 = "SELECT Sport_Name FROM sport WHERE Sport_ID =$i7";
        $results2=mysqli_query($conn,$sql2);
        while ($data2 = mysqli_fetch_array($results2))
        {
            $sportname=$data2["Sport_Name"];
        }
        echo"
       <br><br>
        <div class=\"class1\"> 
            <div><h1>Welcome Home!</h1><br></div>
           <div>
            <p>Name : $MName4</p>
            <p>Your ID : $id </p>
            <p>Nationality:  $i5 </p>
            <p>Rate: $i6 </p> 
            <p>Gender : $i4 </p>
            <p>Sport Name: $sportname </p>
            <p>User Name: $username </p>
            <div class=\"myimg2\"><img src=\"../../Pictures/referee.png\"></div>
           </div>
        </div>";
   }
   
?>  


</body>
</html>
<?php
require_once '..\footer_users.php';
?>