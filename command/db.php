<?php
  $baseDir = realpath(__DIR__.'/../');
  $db = new SQLite3($baseDir.'/command/databases/zhstore.db');
  $dbcache = new SQLite3($baseDir.'/command/databases/affiliate_link.db');
?>