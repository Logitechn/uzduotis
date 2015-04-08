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
    function getPlayertoEditname()
    {   
            global $link;
            global $ID;
            $res= $link->query("SELECT name, surname, birth_years, shirt_number FROM players where ID=".$ID);
            $row = mysqli_fetch_array($res);
            $playerName = $row["name"];
            /*$playerSurname = $row['surname'];
            $playerBirth = $row['birth_years'];
            $playerShirt = $row['shirt_number'];*/
            return $playerName;
            /*return $playerSurname;
            return $playerBirth;
            return $playerShirt;*/
    }
    function getPlayertoEditsurname()
    {   
            global $link;
            global $ID;
            $res= $link->query("SELECT surname FROM players where ID=".$ID);
            $row = mysqli_fetch_array($res);
            $playerSurname = $row["surname"];
            return $playerSurname;
    }
    function getPlayertoEditbirth_years()
    {   
            global $link;
            global $ID;
            $res= $link->query("SELECT birth_years FROM players where ID=".$ID);
            $row = mysqli_fetch_array($res);
            $playerBirth = $row["birth_years"];
            return $playerBirth;
    }
    function getPlayertoEditshirt_number()
    {   
            global $link;
            global $ID;
            $res= $link->query("SELECT shirt_number FROM players where ID=".$ID);
            $row = mysqli_fetch_array($res);
            $playerShirt = $row["shirt_number"];
            return $playerShirt;
    }