
<!DOCTYPE html>
<html>
<head>
    <title> Krepšininko duomenu redagavimas </title>
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
    <h3>Krepšininko duomenu redagavimas:</h3>
<?php 
    require_once('database.php');
    require_once('functions.php');
    
    if(isset($_GET['edit']))
    {
        $ID = mysqli_real_escape_string($link, $_GET['edit']);
        $playerbyID = getPlayerbyID($ID);       
    }
 
    if(isset($_POST['newname']))
    {
        $newname = mysqli_real_escape_string($link, strip_tags($_POST['newname']));
        $newsurname = mysqli_real_escape_string($link, strip_tags($_POST['newsurname']));
        $newbirth_years = mysqli_real_escape_string($link, strip_tags($_POST['newyears']));
        $newshirt_number = mysqli_real_escape_string($link, strip_tags($_POST['newshirtnumber']));		
        $newteam = mysqli_real_escape_string($link, strip_tags($_POST['newteam']));		
        $ID = mysqli_real_escape_string($link, $_POST['ID']);
        if($newname == NULL || $newsurname == NULL || $newteam == NULL){
            die('Name and/or surname and/or team is required!');           
        }elseif($newbirth_years == NULL){
            $sql = "UPDATE players SET name='$newname', surname='$newsurname',
                    birth_years=NULL, shirt_number='$newshirt_number', team='$newteam' where ID='$ID'";
        }elseif($newshirt_number == NULL){
            $sql = "UPDATE players SET name='$newname', surname='$newsurname',
                    birth_years='$newbirth_years', shirt_number=NULL, team='$newteam' where ID='$ID'";
        }else{
            $sql = "UPDATE players SET name='$newname', surname='$newsurname',
                    birth_years='$newbirth_years', shirt_number='$newshirt_number', team='$newteam' where ID='$ID'";
        }
        
        $result = $link->query($sql) or die("Could not update".mysqli_error($link));
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
        <tr>
            <td>Komanda*:</td>
            <td><select name="newteam" class="textfields" >
                <option id="0">  </option>
                <?php 
                    $getallnames = $link->query("Select * FROM teams");
                    while ($viewallnames = mysqli_fetch_array($getallnames)){
                ?>
                        <option id="<?php echo $viewallnames['ID']; ?>"><?php echo $viewallnames['name']; ?></option>
                    <?php } ?>
            </select></td>
        </tr>
    </table>
    
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <strong class="table"><h3>*Būtina įvesti</h3></strong><br>
    <input type="image" src="image/update.png" alt="Submit"></form>
    
</body>
</html>