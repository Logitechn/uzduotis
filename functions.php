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
            $res= $link->query("SELECT name, city, logo FROM teams where ID=".$ID);
            $row = mysqli_fetch_array($res);
            return array('name' => $row['name'],'city' => $row['city'],
            'logo' => $row['logo']);
    }