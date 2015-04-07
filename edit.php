<!DOCTYPE html>
<html>
<head>
    <title> Krepšininkų redagavimas</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<?php 
    require_once('database.php');
    require_once('functions.php');
    
    //$row = getPlayertoEdit();
    if(isset($_GET['edit']))
    {
        $ID = $_GET['edit'];
        $rows = getPlayertoEdit();
        /*if ($rowse)
        {
            foreach ($rowse as $rows)
                if($_GET('ID') == '$ID')
                {
                    $playerName = $rows['column1'];
                    //$playerSurname = $_GET('surname');
                    //$playerBirth = $_GET('birth_years');
                    //$playerShirt = $_GET('shirt_number');
                }                
            
        }*/    
        
    }
 
	if(isset($_POST['newname']))
    {
		$newname = strip_tags($_POST['newname']);
		$newsurname = strip_tags($_POST['newsurname']);
		$newbirth_years = strip_tags($_POST['newyears']);
		$newshirt_number = strip_tags($_POST['newshirtnumber']);
		$ID 	   = $_POST['ID'];
		$sql       = "UPDATE players SET name='$newname', surname='$newsurname',
						birth_years='$newbirth_years', shirt_number='$newshirt_number' where ID='$ID'";
		$res 	   = $link->query($sql) or die("Could not update".mysql_error());
		header("Location:index.php");
		die();
	}
?>
    <form action="edit.php" method="post" >
    <table>
    <tr>
        <td>Krepšininko vardas:  </td>
        <td><input type="text" name="newname" value="<?php echo $rows[1] ; ?>"></td>
    </tr>
    <tr>
        <td>Krepšininko pavardė:  </td>
        <td><input type="text" name="newsurname" value="<?php echo $row['name']; ?>"></td>
    </tr>
    <tr>
        <td>Krepšininko gimimo data:  </td>
        <td><input type="text" name="newyears" value="<?php echo $row[3]; ?>"></td>
    </tr>
    <tr>
        <td>Marškinėliu numeris:  </td>
        <td><input type="text" name="newshirtnumber" value="<?php echo $row[4]; ?>"></td>
    </tr>
    </table>
    
    <input type="text" name="ID" value="<?php echo $ID; ?>">
    <input type="submit" value="Redagavimas" />
    </form>
</body>
</html>