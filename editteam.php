<?php 
    require_once('functions.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title> Komandos duomenu redagavimas </title>
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
    <h3>Komandos duomenu redagavimas:</h3>
<?php 
    require_once('database.php');
    require_once('functions.php');
    
    if(isset($_GET['edit']))
    {
        $ID = mysqli_real_escape_string($link, $_GET['edit']);
        $checkID=$link->query("SELECT team_name, city, logo FROM teams where ID=".$ID) or die(mysqli_error($link));
        if (!(mysqli_num_rows($checkID))) {
            die ('Šis ID negaliojantis');
        }
        $teambyID = getTeamID($ID);       
    }
 
    if(isset($_POST['newname']))
    {
        $newname = mysqli_real_escape_string($link, strip_tags($_POST['newname']));
        $newcity= mysqli_real_escape_string($link, strip_tags($_POST['newcity']));
        $newlogo = mysqli_real_escape_string($link, strip_tags($_POST['newlogo']));	
        $ID = mysqli_real_escape_string($link, $_POST['ID']);
        if($newname == NULL || $newcity == NULL || $newlogo == NULL){
            die('Name, city or logo is required!');           
        }else{
            $sql = ("UPDATE teams SET team_name='$newname', city='$newcity',
                    logo='$newlogo' where ID='$ID'"); 
        }
        $result = $link->query($sql) or die("Could not update".mysqli_error($link));
        header("Location:teamslist.php");
        die();
    }
?>
    <form action="editteam.php" method="post" enctype="multipart/form-data" >
    <table id="table1" class="playersInsert">
        <tr>
            <td>Komandos pavadinimas*:  </td>
            <td><input type="text" name="newname" value="<?php echo $teambyID['team_name']; ?>"></td>
        </tr>
        <tr>
            <td>Komandos miestas*:  </td>
            <td><input type="text" name="newcity" value="<?php echo $teambyID['city']; ?>"></td>
        </tr>
        <tr>
            <td>Komandos logotipas*:  </td>
            <td><div id="my-icon-select"></div></td>
            <td><input type="hidden" id="selected-text" name="newlogo"></td>
        </tr>
    </table>
    
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <strong class="table"><h3>*Būtina įvesti</h3></strong><br>
    <input type="image" src="image/update.png" alt="Submit"></form>
    
</body>
</html>