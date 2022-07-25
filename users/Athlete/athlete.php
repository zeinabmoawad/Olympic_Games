<?php
require_once '../../includes/database.php';
require_once 'athleteheader.php';
?>

<?php
    
     session_start();
     $username = $_SESSION['sessionUser'];
    $sql = "SELECT * FROM athlete WHERE username ='$username'";
    $results=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($results))
    {
        $id = $data['A_ID'];
         $i4 = $data['Gender'];
         $i5 = $data['Age'];
         $i6 = $data['Country'];
         $i7 = $data['Weight'];
         $i8 = $data['Rank'];
         $i9 = $data['Warnings'];
         $i10 = $data['ClubID'];
         $i11 = $data['SportID'];
         $clubname="";
         $sportname="";
         $MName4 = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
         $sql1 = "SELECT Club_Name FROM club WHERE Club_ID =$i10";
         $results1=mysqli_query($conn,$sql1);
         while ($data1 = mysqli_fetch_array($results1))
         {
             $clubname=$data1["Club_Name"];
         }
         $sql2 = "SELECT Sport_Name FROM sport WHERE Sport_ID =$i11";
         $results2=mysqli_query($conn,$sql2);
         while ($data2 = mysqli_fetch_array($results2))
         {
             $sportname=$data2["Sport_Name"];
         }
        echo "<br><br><br>";

    echo"
       
     <div class=\"class1\"> 
         <div><h1>Welcome Home!</h1><br></div>
        <div>
         <p>Name : $MName4 </p>
         <p>Your ID :$id </p>
         <p>Age:  $i5 </p>
         <p>Country: $i6 </p> 
         <p>Weight : $i7 </p>
         <p>Rank : $i8 </p>
         <p>Warning : $i9 </p>
         <p>Gender : $i4 </p>
         <p>Sport Name: $sportname </p>
         <p>Club Name : $clubname </p>
        </div>
     </div>";
         
        

    }
    
?>  
</body>
</html>
<?php
require_once '..\footer_users.php';
?>
