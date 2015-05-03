<?php
    function getPlayers()
    {
            global $link;
            $sql= "SELECT * FROM players"; 
            $query= $link->query($sql);
            if ($query != false)
            {
                $result = array(); 
                while ( $row = mysqli_fetch_assoc($query) )
                    $result[] = $row;
                return $result;
            }
            return null;
    }
    function getTeams()
    {
            global $link;
            $sql= "SELECT * FROM teams"; 
            $query= $link->query($sql);
            if ($query != false)
            {
                $result = array(); 
                while ( $row = mysqli_fetch_assoc($query) )
                    $result[] = $row;
                return $result;
            }
            return null;
    }
    function getPlayerbyID($ID)
    {   
            global $link;
            $res= $link->query("SELECT name, surname, birth_years, shirt_number FROM players where ID=".$ID);
            $row = mysqli_fetch_array($res);            
            return array('name' => $row['name'],'surname' => $row['surname'],
            'birth_years' => $row['birth_years'],'shirt_number' => $row['shirt_number']);
    }
    function getTeamID($ID)
    {   
            global $link;
            $res= $link->query("SELECT team_name, city, logo FROM teams where ID=".$ID);
            $row = mysqli_fetch_array($res);
            return array('team_name' => $row['team_name'],'city' => $row['city'],
            'logo' => $row['logo']);
    }
    function getPlayersbyID($name){
        global $link;
        $query= $link->query("select * FROM players,teams where players.team = teams.team_name AND teams.team_name = '".$name."'");
        if ($query != false)
        {
            $result = array(); 
            while ( $row = mysqli_fetch_assoc($query) )
                $result[] = $row;
                return $result;
        }
        return null;
    }
?>
<script type="text/javascript" src="javascript/iconselect.js">
</script>
<script type="text/javascript" src="javascript/iscroll.js">
</script>
<script type="text/javascript">
            
        var iconSelect;
        var selectedText;

        window.onload = function(){
            
            selectedText = document.getElementById('selected-text');
            
            document.getElementById('my-icon-select').addEventListener('changed', function(e){
               selectedText.value = iconSelect.getSelectedValue();
            });
            
            iconSelect = new IconSelect("my-icon-select");

            var icons = [];
            icons.push({'iconFilePath':'image/1.png', 'iconValue':'1'});
            icons.push({'iconFilePath':'image/2.png', 'iconValue':'2'});
            icons.push({'iconFilePath':'image/3.png', 'iconValue':'3'});
            icons.push({'iconFilePath':'image/4.png', 'iconValue':'4'});
            icons.push({'iconFilePath':'image/5.png', 'iconValue':'5'});
            icons.push({'iconFilePath':'image/6.png', 'iconValue':'6'});
            icons.push({'iconFilePath':'image/7.png', 'iconValue':'7'});
            icons.push({'iconFilePath':'image/8.png', 'iconValue':'8'});
            icons.push({'iconFilePath':'image/9.png', 'iconValue':'9'});
            icons.push({'iconFilePath':'image/10.png', 'iconValue':'10'});
            icons.push({'iconFilePath':'image/11.png', 'iconValue':'11'});
            
            iconSelect.refresh(icons);
        };
            
</script>