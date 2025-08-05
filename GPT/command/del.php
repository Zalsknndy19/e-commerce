<?php
  $addpg = new SQLite3('./databases/gpt.db');
  $id = $_GET["kode"];
  $sql = "DELETE from prompt where id = $id";
   
   $ret = $addpg->exec($sql);
   if($ret == 1 ){
     //echo $db->changes(), " Record deleted successfully\n";
     //header("Location: ..", true, 301);
     echo "<script>location.href = '..';</script>" ;
     exit();
   } else {
     echo $db->lastErrorMsg();
   }
?>