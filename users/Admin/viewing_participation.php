<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Athlete Name</th>
                    <th>Athlete ID</th>
                    <th>Match Name</th>
                    <th>Match ID</th>
                </tr>";
    $sql = "SELECT AthleteID,MatchID,Fname,Minit,Lname,M_Name FROM participation,athlete,matche WHERE AthleteID=A_ID AND MatchID=M_ID";
    $res=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($res))
    {
        $a_id = $data['AthleteID'];
         $athlete_name = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
         $m_id = $data['MatchID'];
         $match_name = $data['M_Name'];
         
               echo "<tr>
                        <th>$athlete_name</th>
                        <th>$a_id</th>
                        <th>$match_name</th>
                        <th>$m_id</th>
                        
                    </tr>";
                
    }
    echo "</table>";
?>