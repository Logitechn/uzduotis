<!DOCTYPE html>
<html>
<head>
    <title>Komandos sąrašas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
        <h2>Komandos sąrašas:</h2>

<?php
    require_once('database.php');
    require_once('functions-php.php');
    if(isset($_GET['view']))
    {
        $name = mysqli_real_escape_string($link, $_GET['view']);
        $checkID=$link->query("select city, logo FROM teams where team_name='$name'") or die(mysqli_error($link));
        if (!(mysqli_num_rows($checkID))) {
            die ('Ši komanda neegzistuoja');
        }
        $playersyID = getPlayersbyTeamName($name);       
    }
    echo "<table id=\"table2\" class=\"PlayersListTable table\">";
    echo "<tr><th>Eilės nr.</th><th>Krepšininko vardas</th><th>Krepšininko pavardė</th><th>Gimimo data</th><th>Marškineliu numeris</th>";
    
    $ind = 0;
    $i = 0;
    
    if ($playersyID)
    {
        foreach ($playersyID as $row)
        {
            $ind++;
            $i++; if (($i %2) == 0) {$class = "coloredbackground";} else {$class = "normalbackground";};
                echo 
                    "<tr><td class=\"".$class."\">" .$ind.
                    "</td><td class=\"".$class."\">". $row['name']. 
                    "</td><td class=\"".$class."\">" .$row['surname'].
                    "</td><td class=\"".$class."\">" .$row['birth_years'].
                    "</td><td class=\"".$class."\">" .$row['shirt_number'].
                    "</td></tr>";  
        }
    }    
    echo "</table>";
?>

</body>
</html>