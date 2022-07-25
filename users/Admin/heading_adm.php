


<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../includes/TicketStyling.css">
</head>

<body>
    <header>
        <nav>
          <img src="..\..\Pictures\OlyLogo.png" alt="calender" style="height:60px;">
            <ul>
                <li><form action="add_admin.php" method = "post" style = "display: inline;" class="admon_H butona">
                    <button type = "submit" name="submit2">Add Admin</button>
                    </form>
                </li>
                <li>
                    <form action="admin.php" method = "post" style = "display: inline;" class="admon_H">
                        <select name="select_insert" >
                            <option disabled selected>What to edit?</option>
                            <option value="athlete">Athlete</option>
                            <option value="referee">Referee</option>
                            <option value="sponsor">Sponsor</option>
                            <option value="match">Match</option>
                            <option value="city">City</option>
                            <option value="coach">Coach</option>
                            <option value="club">Club</option>
                            <option value="venue">Venue</option>
                            <option value="sport">Sport</option>
                            <option value="price">Price</option>
                            <option value="participation">Participation</option>
                            <option value="referee_match">Assign a referee to a match</option>
                        </select>
                        <button type = "submit" name="submit">Edit</button>
                    </form>
                </li>
                <li><a href="admin.php">Home</a></li>
               <li> <a href="../../login.php">LogOut</a></li>
            </ul>
        </nav>
    </header>

