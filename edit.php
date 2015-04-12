<!DOCTYPE html>
<html>
<head>
    <title> Krepšininko duomenu redagavimas </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
    <h3>Krepšininko duomenu redagavimas:</h3>
<?php 
    require_once('database.php');
    require_once('functions.php');
    
    if(isset($_GET['edit']))
    {
        $ID = $_GET['edit'];
        $playerbyID = getPlayerbyID($ID);       
    }
 
	if(isset($_POST['newname']))
    {
		$newname = mysqli_real_escape_string($link, strip_tags($_POST['newname']));
		$newsurname = mysqli_real_escape_string($link, strip_tags($_POST['newsurname']));
		$newbirth_years = mysqli_real_escape_string($link, strip_tags($_POST['newyears']));
		$newshirt_number = mysqli_real_escape_string($link, strip_tags($_POST['newshirtnumber']));		
        $ID = $_POST['ID'];
        
        if($newname == NULL || $newsurname == NULL){
            die('Name and/or surname is required!');           
        }elseif($newbirth_years == NULL){
            $sql = "UPDATE players SET name='$newname', surname='$newsurname',
                birth_years=NULL, shirt_number='$newshirt_number' where ID='$ID'";
        }elseif($newshirt_number == NULL){
            $sql = "UPDATE players SET name='$newname', surname='$newsurname',
                birth_years='$newbirth_years', shirt_number=NULL where ID='$ID'";
        }else{
            $sql = "UPDATE players SET name='$newname', surname='$newsurname',
                birth_years='$newbirth_years', shirt_number='$newshirt_number' where ID='$ID'";
        }
		$result = $link->query($sql) or die("Could not update".mysql_error());
		header("Location:index.php");
		die();
	}
?>
    <form action="edit.php" method="post" >
    <table id="table1" class="playersInsert">
        <tr>
            <td>Krepšininko vardas*:  </td>
            <td><input type="text" name="newname" value="<?php echo $playerbyID['name']; ?>"></td>
        </tr>
        <tr>
            <td>Krepšininko pavardė*:  </td>
            <td><input type="text" name="newsurname" value="<?php echo $playerbyID['surname']; ?>"></td>
        </tr>
        <tr>
            <td>Krepšininko gimimo data:  </td>
            <td><input type="text" name="newyears" value="<?php echo $playerbyID['birth_years']; ?>"></td>
        </tr>
        <tr>
            <td>Marškinėliu numeris:  </td>
            <td><input type="text" name="newshirtnumber" value="<?php echo $playerbyID['shirt_number']; ?>"></td>
        </tr>
    </table>
    
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <strong class="table"><h3>*Būtina įvesti</h3></strong><br>
    <input type="image" src="image/update.png" alt="Submit"></form>
    
</body>
</html>