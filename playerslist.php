<!DOCTYPE html>
<html>
<head>
    <title>Krepðininku sàraðas</title>
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
        <h2>Krepðininku sàraðas:</h2>

<?php
    require_once('database.php');
    require_once('functions.php');
    echo "<table id=\"table2\" class=\"PlayersListTable table\">";
    echo "<tr><th>Eilës nr.</th><th>Krepðininko vardas</th><th>Krepðininko pavardë</th><th>Gimimo data</th><th>Marðkineliu numeris</th><th>  </th><th>  </th></tr>";
    
    $ind = 0;
    $i = 0;
    $edit = " ";
    $delit = " ";
     
    $rows = getPlayers();
    if ($rows)
    {
        foreach ($rows as $row)
        {
            $ind++;
            $edit = "<a href='edit.php?edit={$row['ID']}'><img src='image/edit.png'></a>";
            $delit = "<a onClick=\"javascript: return confirm('Ar tikrai norite iðtrynti?');\" href='delete.php?del={$row['ID']}'><img src='image/delete.png'></a>";
            $i++; if (($i %2) == 0) {$class = "coloredbackground";} else {$class = "normalbackground";};
            echo 
                "<tr><td class=\"".$class."\">" .$ind. 
                "</td><td class=\"".$class."\">". $row['name']. 
                "</td><td class=\"".$class."\">" .$row['surname']. 
                "</td><td class=\"".$class."\">" .$row['birth_years']. 
                "</td><td class=\"".$class."\">" .$row['shirt_number'].
                "</td><td class=\"".$class."\">" . $edit. 
                "</td><td class=\"".$class."\">" . $delit.             
                "</td></tr>";
        }
    }
    echo "</table>";
?>

</body>
</html>