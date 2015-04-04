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
    function getPlayerstoEdit()
    {
            global $link;
            $sql= "SELECT * FROM players"; 
            $query= $link->query($sql);
            if(isset($_GET['edit']))
            {
                $ID = $_GET['edit'];
                $res =$link->query("SELECT * FROM players where ID=".$ID);
                $row = mysqli_fetch_array($res);
            }
            
    }
?>
<script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Ar tikrai istrinti?"))
                 location.href='delete.php?del=$row[ID];
      }
</script>