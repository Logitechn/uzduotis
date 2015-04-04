<!DOCTYPE html>
<html>
<head>
    <title>Krepšininku registravimas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
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
    
    <p><a href="#">Test</a></p>
    
    <strong class="table">*Būtina įvesti</strong><br>
    <input type="submit" value="Prideti" name="Submit"></form>
    <h2>Krepšininku sąrašas:</h2>

<?php
    require_once('datebase.php');
    echo "<table id=\"table2\" class=\"playersListTable table\">";
    echo "<tr><th>Eilės nr.</th><th>Krepšininko vardas</th><th>Krepšininko pavardė</th><th>Gimimo data</th><th>Marškineliu numeris</th><th>  </th><th>  </th></tr>";
    
    $ind = 0;
    $i = 0;
    $editas = " ";
    $delitas = " ";
    //while(getPlayer($ID, $name, $surname, $birth_years, $shirt_number) != false){
    
    $rows = getPlayers();
    if ($rows)
    {
        foreach ($rows as $row)
        {
            $ind++;
            $editas = "<a href='edit.php?edit=$row[ID]'>edit</a>";
            $delitas = "<a href='delete.php?del=$row[ID]'>delete</a>";
            $i++; if (($i %2) == 0) {$class = "coloredbackground";} else {$class = "normalbackground";};
            echo 
                "<tr><td class=\"".$class."\">" .$ind. 
                "</td><td class=\"".$class."\">". $row['name']. 
                "</td><td class=\"".$class."\">" .$row['surname']. 
                "</td><td class=\"".$class."\">" .$row['birth_years']. 
                "</td><td class=\"".$class."\">" .$row['shirt_number'].
                "</td><td class=\"".$class."\">" . $editas . 
                "</td><td class=\"".$class."\">" . $delitas .
                "</td></tr>";
        }
    }
    echo "</table>";
       /* $ind++;
        $editas = "<a href='edit.php?edit=$row[ID]'>edit</a>";
        $delitas = "<a href='delete.php?del=$row[ID]'>delete</a>";
        $i++; if (($i %2) == 0) {$class = "coloredbackground";} else {$class = "normalbackground";};
        echo 
        "<tr><td class=\"".$class."\">" .$ind. 
        "</td><td class=\"".$class."\">". $row['name']. 
        "</td><td class=\"".$class."\">" .$row['surname']. 
        "</td><td class=\"".$class."\">" .$row['birth_years']. 
        "</td><td class=\"".$class."\">" .$row['shirt_number'].
        "</td><td class=\"".$class."\">" . $editas . 
        "</td><td class=\"".$class."\">" . $delitas .
        "</td></tr>";
}

echo "</table>";
*/

?>
</body>
</html>