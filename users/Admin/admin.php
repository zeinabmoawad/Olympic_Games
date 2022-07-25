<?php
    require_once 'heading_adm.php';
    echo '<link rel="stylesheet" type="text/css" href="../../includes/style.css">';
    echo '<link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">';
?>

<div class="admon">
<h1>   
    <br>
    Welcome Admin!
    
</h1><br>
<img src="../../Pictures/pngwing.com.png" alt="">

</div>


<?php

    require '../../includes/database.php';
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['select_insert']))
        {
            $data = $_POST['select_insert'];
            if($data == 'athlete')
            {
                header("Location: athlete.php" );
                exit();
            } else if ($data == 'match')
            {
                header("Location: match.php" );
                exit();
            }
            else if ($data == 'referee')
            {
                header("Location: referee.php" );
                exit();
            }
            else if ($data == 'sponsor')
            {
                header("Location: sponsor.php" );
                exit();
            }
            else if ($data == 'city')
            {
                header("Location: city.php" );
                exit();
            }   else if ($data == 'coach')
            {
                header("Location: coach.php" );
                exit();
            }
            else if ($data == 'club')
            {
                header("Location: club.php" );
                exit();
            }
            else if ($data == 'venue')
            {
                header("Location: venue.php" );
                exit();
            }
            else if ($data == 'sport')
            {
                header("Location: sport.php" );
                exit();
            }
            else if ($data == 'price')
            {
                header("Location: editing_price.php" );
                exit();
            }
            else if ($data == 'participation')
            {
                header("Location: participation.php" );
                exit();
            }
            else if ($data == 'referee_match')
            {
                header("Location: referee_match.php" );
                exit();
            }
        }
    }
        
    
?>

<?php

require_once '../footer_users.php';
?>