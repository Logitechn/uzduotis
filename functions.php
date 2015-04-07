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
    function getPlayertoEdit()
    {   
            global $link;
            global $ID;
            $res= $link->query("SELECT * FROM players where ID=".$ID);
                if ($res != false)
                {
                    if ($_GET['id'] == $ID)
                    {   
                        $result = array(); 
                        while ( $row = mysqli_fetch_array($res) )
                            $result[] = $row;
                        return $result;
                    }
                }
                return null;
    }