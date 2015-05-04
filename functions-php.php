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
            $res= $link->query("SELECT name, surname, birth_years, shirt_number, team FROM players where ID=".$ID);
            $row = mysqli_fetch_array($res);            
            return array('name' => $row['name'],'surname' => $row['surname'],
            'birth_years' => $row['birth_years'],'shirt_number' => $row['shirt_number'], 'team' => $row['team']);
    }
    function getTeamID($ID)
    {   
            global $link;
            $res= $link->query("SELECT team_name, city, logo_name FROM teams where ID=".$ID);
            $row = mysqli_fetch_array($res);
            return array('team_name' => $row['team_name'],'city' => $row['city'],
            'logo' => $row['logo']);
    }
    function getPlayersbyTeamName($name){
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