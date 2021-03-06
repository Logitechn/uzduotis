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
    require_once('functions-php.php');
    
    if(isset($_GET['edit']))
    {
        $ID = mysqli_real_escape_string($link, $_GET['edit']);
        $checkID=$link->query("SELECT teams_name, city, logo_name FROM teams where ID=".$ID) or die(mysqli_error($link));
        if (!(mysqli_num_rows($checkID))) {
            die ('Šis ID negaliojantis');
        }
        $teambyID = getTeamID($ID);        
    }
 
    if(isset($_POST['newname']))
    {
        $target_dir = "images/";
        $target_file = mysqli_real_escape_string($link, $target_dir . basename($_FILES["fileToUpload"]["name"]));
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            else{
                die ('File is not an image.');
                $uploadOk = 0;
            }
        }
        
        for ($seq = 0; file_exists($target_file); $seq++){
            if(file_exists($target_file)){
                $target_file = $target_dir . basename( $_FILES["fileToUpload"]["name"]) . $seq . '.' . $imageFileType;
            } 
            
        }
        
        if (!empty($_FILES["fileToUpload"]["name"])){
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                die ('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                $uploadOk = 0;
            } 
        }
        if ($uploadOk == 0){
        die ('Sorry, your file was not uploaded.');
        }
        else{
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            }
        }
        
        $newname = mysqli_real_escape_string($link, strip_tags($_POST['newname']));
        $newcity= mysqli_real_escape_string($link, strip_tags($_POST['newcity']));
        $ID = mysqli_real_escape_string($link, $_POST['ID']);
        
        if($newname == NULL || $newcity == NULL ){
            die('Name, city or logo is required!');           
        }else{
            $rows = getPlayers();
            if ($rows)
            {
                foreach ($rows as $row)
                {
                    if (!empty($_FILES["fileToUpload"]["name"])){
                        $sql = ("UPDATE teams SET teams_name='$newname', city='$newcity', logo_name='$target_file' where ID='$ID'");                        
                        $result = $link->query($sql) or die("Could not update".mysqli_error($link));
                        header("Location:teamslist.php");
                        die();
                    }else{
                        $sql = ("UPDATE teams SET teams_name='$newname', city='$newcity' where ID='$ID'");
                        $result = $link->query($sql) or die("Could not update".mysqli_error($link));
                        header("Location:teamslist.php");
                        die();
                    }
                }         
            } 
        }
    }
?>
    <form action="editteam.php" method="post" enctype="multipart/form-data" >
    <table id="table1" class="playersInsert">
        <tr>
            <td>Komandos pavadinimas*:  </td>
            <td><input type="text" name="newname" value="<?php echo $teambyID['teams_name']; ?>"></td>
        </tr>
        <tr>
            <td>Komandos miestas*:  </td>
            <td><input type="text" name="newcity" value="<?php echo $teambyID['city']; ?>"></td>
        </tr>
        <tr>
            <td>Komandos logotipas*:  </td>
            <td><img src="<?php echo $teambyID['logo_name']; ?>" height="50" width="50" alt="nera logotipo"></td>
        </tr>
        <tr>
            <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
        </tr>
    </table>
    
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <h3><strong class="table">*Būtina įvesti</strong></h3>
    <input type="image" src="image/update.png" name="submit" alt="atnaujinti"></form>
    
</body>
</html>