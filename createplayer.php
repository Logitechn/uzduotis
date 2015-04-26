<!DOCTYPE html>
<html>
<head>
    <title>Krepšininku registravimas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    <div id='cssmenu'>
    <ul>
       <li><a href='index.php'><span>Home</span></a></li>
       <li class='active has-sub'><a href=' '><span>Players</span></a>
          <ul>
             <li class='has-sub'><a href='createplayer.php'><span>Create Player</span></a></li>
             <li class='has-sub'><a href='playerslist.php'><span>List of Players</span></a></li>
          </ul>
       </li>
       <li class='active has-sub'><a href=' '><span>Team</span></a>
          <ul>
             <li class='has-sub'><a href='createteam.php'><span>Create Team</span></a></li>
             <li class='has-sub'><a href='teamslist.php'><span>List of Teams</span></a></li>
          </ul>
       </li>
    </ul>
    </div>
        <form action="insert.php" method="post">
    <h3><strong class="errorText specTest">Krepšinio žaidėju registravimo forma:</strong></h3>
    <table id="table1" class="playersInsert">
        <tr>
            <td>Krepšininko vardas*:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Krepšininko pavarde*:</td>
            <td><input type="text" name="surname"></td>
        </tr>
        <tr>
            <td>Krepšininko gimimo data:</td>
            <td><input type="text" name="birth_years"></td>
        </tr>
        <tr>
            <td>Marškinėliu numeris:</td>
            <td><input type="text" name="shirt_number"></td>
        </tr>
    </table>
    
    <strong class="table"><h3>*Būtina įvesti</h3></strong><br>
    <input type="image" src="image/save.png" alt="Submit"></form>
</body>
</html>