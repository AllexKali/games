<?php
require_once('../classes/db.php');
$Database = new Database;
var_dump($Database->Query('SELECT * FROM pg_stat_activity;',array(1),"Test"));
?>