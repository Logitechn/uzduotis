<!DOCTYPE html>
<html>
<head>
    <title>Komandu sàraðas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
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
        <h2>Komandu sàraðas:</h2>

<?php
    require_once('database.php');
    require_once('functions.php');
    echo "<table id=\"table2\" class=\"PlayersListTable table\">";
    echo "<tr><th>Eilës nr.</th><th>Komandu pavadinimai</th><th>Komandu miestai</th><th>Komandu logotipai</th><th>  </th><th>  </th></tr>";
    
    $ind = 0;
    $i = 0;
    $edit = " ";
    $delit = " ";
     
    $rows = getTeams();
    if ($rows)
    {
        foreach ($rows as $row)
        {
            $ind++;
            $edit = "<a href='editteam.php?edit={$row['ID']}'><img src='image/edit.png'></a>";
            //$delit = "<a onClick=\"javascript: return confirm('Ar tikrai norite iðtrynti?');\" href='delete.php?del={$row['ID']}'><img src='image/delete.png'></a>";
            $delit = "<a onClick=\"javascript: return confirm('Ar tikrai norite iðtrynti?');\" href='delete.php?del={$row['ID']}'><img src='image/delete.png'></a>";
            $i++; if (($i %2) == 0) {$class = "coloredbackground";} else {$class = "normalbackground";};
            if ($row['logo'] == 1){
                $picture = "<img src='images/icons/1.png'>";
            }elseif($row['logo'] == 2){
                $picture = "<img src='images/icons/2.png'>";
            }elseif($row['logo'] == 3){
                $picture = "<img src='images/icons/3.png'>";
            }elseif($row['logo'] == 4){
                $picture = "<img src='images/icons/4.png'>";
            }elseif($row['logo'] == 5){
                $picture = "<img src='images/icons/5.png'>";
            }elseif($row['logo'] == 6){
                $picture = "<img src='images/icons/6.png'>";
            }elseif($row['logo'] == 7){
                $picture = "<img src='images/icons/7.png'>";
            }elseif($row['logo'] == 8){
                $picture = "<img src='images/icons/8.png'>";
            }elseif($row['logo'] == 9){
                $picture = "<img src='images/icons/9.png'>";
            }elseif($row['logo'] == 10){
                $picture = "<img src='images/icons/10.png'>";
            }elseif($row['logo'] == 11){
                $picture = "<img src='images/icons/11.png'>";
            }             
            echo 
                "<tr><td class=\"".$class."\">" .$ind. 
                "</td><td class=\"".$class."\">". $row['name']. 
                "</td><td class=\"".$class."\">" .$row['city']. 
                "</td><td class=\"".$class."\">" .$picture. 
                "</td><td class=\"".$class."\">" . $edit. 
                //"</td><td class=\"".$class."\">" . "<a onClick=\"javascript: return confirm('Ar tikrai norite iðtrynti?');\" href='delete.php?del={$row['ID']}'><img src='image/delete.png'></a>".             
                "</td><td class=\"".$class."\">" . $delit.             
                "</td></tr>";
        }
    }
    echo "</table>";
?>

</body>
</html>