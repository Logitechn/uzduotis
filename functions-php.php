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
            $res= $link->query("SELECT name, surname, birth_years, shirt_number, team_name FROM players where ID=".$ID);
            $row = mysqli_fetch_array($res);            
            return array('name' => $row['name'],'surname' => $row['surname'],
            'birth_years' => $row['birth_years'],'shirt_number' => $row['shirt_number'], 'team_name' => $row['team_name']);
    }
    function getTeamID($ID)
    {   
            global $link;
            $res= $link->query("SELECT teams_name, city, logo_name FROM teams where ID=".$ID);
            $row = mysqli_fetch_array($res);
            return array('teams_name' => $row['teams_name'],'city' => $row['city'],
            'logo_name' => $row['logo_name']);
    }
    function getPlayersbyTeamID($ID){
        global $link;
        $query= $link->query("select * FROM players,teams where players.team_ID = teams.ID AND teams.ID = '".$ID."'");
        if ($query != false)
        {
            $result = array(); 
            while ( $row = mysqli_fetch_assoc($query) )
                $result[] = $row;
                return $result;
        }
        return null;
    }