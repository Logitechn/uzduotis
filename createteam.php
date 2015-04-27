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
    <title>Komandos registravimas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/lib/control/iconselect.css" >
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
        <form action="insertteam.php" method="post">
    <h3><strong class="errorText specTest">Krepðinio komandu registravimo forma:</strong></h3>
    <table id="table1" class="playersInsert">
        <tr>
            <td>Komandos pavadinimas*:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Komandos miestas*:</td>
            <td><input type="text" name="city"></td>
        </tr>
        <tr>
            <td>Komandos logotipas*:</td>
            <td><div id="my-icon-select"></div></td>
            <td><input type="hidden" id="selected-text" name="logo"></td>
        </tr>
    </table>
    
    <strong class="table"><h3>*Bûtina ávesti</h3></strong><br>
    <input type="image" src="image/save.png" alt="Submit"></form>
</body>
</html>