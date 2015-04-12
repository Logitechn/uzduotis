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
    function getPlayerbyID($ID)
    {   
            global $link;
            $res= $link->query("SELECT name, surname, birth_years, shirt_number FROM players where ID=".$ID);
            $row = mysqli_fetch_array($res);
            return array('name' => $row['name'],'surname' => $row['surname'],
            'birth_years' => $row['birth_years'],'shirt_number' => $row['shirt_number']);
    }
    function encryptIt($q) 
    {
        $cryptKey = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return($qEncoded);
    }

    function decryptIt($q) 
    {
        $cryptKey = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return($qDecoded);
    }