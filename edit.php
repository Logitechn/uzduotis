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
    
    if(isset($_GET['edit']))
    {
        $ID = $_GET['edit'];
        list($playerName, $playerSurname, $playerBirth, $playerShirt) = getPlayerbyID();       
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
        <td><input type="text" name="newname" value="<?php echo $playerName; ?>"></td>
    </tr>
    <tr>
        <td>Krepšininko pavardė:  </td>
        <td><input type="text" name="newsurname" value="<?php echo $playerSurname; ?>"></td>
    </tr>
    <tr>
        <td>Krepšininko gimimo data:  </td>
        <td><input type="text" name="newyears" value="<?php echo $playerBirth; ?>"></td>
    </tr>
    <tr>
        <td>Marškinėliu numeris:  </td>
        <td><input type="text" name="newshirtnumber" value="<?php echo $playerShirt; ?>"></td>
    </tr>
    </table>
    
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <input type="submit" value="Redagavimas" />
    </form>
</body>
</html>