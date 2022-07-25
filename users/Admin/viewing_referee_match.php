<?php
            require_once '../../includes/database.php';
                echo "
                <br></br>
                <table style=\"width:95%;\">
                <tr style=\"background-color: moccasin;\">
                    <th>Referee Name</th>
                    <th>Referee ID</th>
                    <th>Match Name</th>
                    <th>Match ID</th>
                </tr>";
    $sql = "SELECT RefereeID,MatchID,Fname,Minit,Lname,M_Name FROM referee_matches,referee,matche WHERE RefereeID=Referee_ID AND MatchID=M_ID";
    $res=mysqli_query($conn,$sql);
    while ($data = mysqli_fetch_array($res))
    {
        $r_id = $data['RefereeID'];
         $referee_name = $data['Fname']." ".$data['Minit']." ".$data['Lname'];
         $m_id = $data['MatchID'];
         $match_name = $data['M_Name'];
         
               echo "<tr>
                        <th>$referee_name</th>
                        <th>$r_id</th>
                        <th>$match_name</th>
                        <th>$m_id</th>
                        
                    </tr>";
                
    }
    echo "</table>";
?>