<!DOCTYPE html>
<html>
<head>
    <title> Krepšininkų redagavimas</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<?php 
    require_once('database.php');

    if(isset($_GET['edit']))
    {
        $ID = $_GET['edit'];
        $res =$link->query("SELECT * FROM players where ID=".$ID);
        $row = mysqli_fetch_array($res);
    }

	if(isset($_POST['newname']))
    {
		$newname = $_POST['newname'];
		$newsurname = $_POST['newsurname'];
		$newbirth_years = $_POST['newyears'];
		$newshirt_number = $_POST['newshirtnumber'];
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
        <td><input type="text" name="newname" value="<?php echo $row[1]; ?>"></td>
    </tr>
    <tr>
        <td>Krepšininko pavardė:  </td>
        <td><input type="text" name="newsurname" value="<?php echo $row[2]; ?>"></td>
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
    
    <input type="hidden" name="ID" value="<?php echo $row[0]; ?>">
    <input type="submit" value="Redagavimas" />
    </form>
</body>
</html>