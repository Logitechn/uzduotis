<script type="text/javascript" src="lib/control/iconselect.js"></script>
<script type="text/javascript" src="lib/iscroll.js"></script>
<script>
            
        var iconSelect;
        var selectedText;

        window.onload = function(){
            
            selectedText = document.getElementById('selected-text');
            
            document.getElementById('my-icon-select').addEventListener('changed', function(e){
               selectedText.value = iconSelect.getSelectedValue();
            });
            
            iconSelect = new IconSelect("my-icon-select");

            var icons = [];
            icons.push({'iconFilePath':'images/icons/1.png', 'iconValue':'1'});
            icons.push({'iconFilePath':'images/icons/2.png', 'iconValue':'2'});
            icons.push({'iconFilePath':'images/icons/3.png', 'iconValue':'3'});
            icons.push({'iconFilePath':'images/icons/4.png', 'iconValue':'4'});
            icons.push({'iconFilePath':'images/icons/5.png', 'iconValue':'5'});
            icons.push({'iconFilePath':'images/icons/6.png', 'iconValue':'6'});
            icons.push({'iconFilePath':'images/icons/7.png', 'iconValue':'7'});
            icons.push({'iconFilePath':'images/icons/8.png', 'iconValue':'8'});
            icons.push({'iconFilePath':'images/icons/9.png', 'iconValue':'9'});
            icons.push({'iconFilePath':'images/icons/10.png', 'iconValue':'10'});
            icons.push({'iconFilePath':'images/icons/11.png', 'iconValue':'11'});
            icons.push({'iconFilePath':'images/icons/12.png', 'iconValue':'12'});
            icons.push({'iconFilePath':'images/icons/13.png', 'iconValue':'13'});
            icons.push({'iconFilePath':'images/icons/14.png', 'iconValue':'14'});
            
            iconSelect.refresh(icons);
            


        };
            
</script>
<!DOCTYPE html>
<html>
<head>
    <title> Krepšininko duomenu redagavimas </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/lib/control/iconselect.css" >
</head>
<body>
    <h3>Krepšininko duomenu redagavimas:</h3>
<?php 
    require_once('database.php');
    require_once('functions.php');
    
    if(isset($_GET['edit']))
    {
        $ID = mysqli_real_escape_string($link, $_GET['edit']);
        $teambyID = getTeamID($ID);       
    }
 
    if(isset($_POST['newname']))
    {
        $newname = mysqli_real_escape_string($link, strip_tags($_POST['newname']));
        $newcity= mysqli_real_escape_string($link, strip_tags($_POST['newcity']));
        $newlogo = mysqli_real_escape_string($link, strip_tags($_POST['newlogo']));	
        $ID = mysqli_real_escape_string($link, $_POST['ID']);
        /*if($newname == NULL || $newsurname == NULL){
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
        }*/
        $result = $link->query($sql) or die("Could not update".mysqli_error($link));
        header("Location:index.php");
        die();
    }
?>
    <form action="editteam.php" method="post" >
    <table id="table1" class="playersInsert">
        <tr>
            <td>Krepšininko vardas*:  </td>
            <td><input type="text" name="newname" value="<?php echo $teambyID['name']; ?>"></td>
        </tr>
        <tr>
            <td>Krepšininko pavardė*:  </td>
            <td><input type="text" name="newcity" value="<?php echo $teambyID['city']; ?>"></td>
        </tr>
        <tr>
            <td>Krepšininko gimimo data:  </td>
            <td><div id="my-icon-select"></div></td>
            <td><input type="hidden" name="newlogo" value="<?php echo $teambyID['logo']; ?>"></td>
        </tr>
    </table>
    
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <strong class="table"><h3>*Būtina įvesti</h3></strong><br>
    <input type="image" src="image/update.png" alt="Submit"></form>
    
</body>
</html>