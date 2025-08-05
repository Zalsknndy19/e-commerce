<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('./databases/VPN');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo 'Databse berhasil dibuka';
   }
?>