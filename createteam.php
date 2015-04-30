<?php 
    require_once('functions.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Komandos registravimas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/lib/control/iconselect.css" >
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
        <form action="insertteam.php" method="post">
    <h3><strong class="errorText specTest">Komandu registravimo forma:</strong></h3>
    <table id="table1" class="playersInsert">
        <tr>
            <td>Komandos pavadinimas*:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Komandos miestas*:</td>
            <td><input type="text" name="city"></td>
        </tr>
        <tr>
            <td>Komandos logotipas*:</td>
            <td><div id="my-icon-select"></div></td>
            <td><input type="hidden" id="selected-text" name="logo"></td>
        </tr>
    </table>
    
    <strong class="table"><h3>*Būtina įvesti</h3></strong><br>
    <input type="image" src="image/save.png" alt="Submit"></form>
</body>
</html>