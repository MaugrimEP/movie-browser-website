<?php
require_once('../class/BD.class.php');
require_once('../functions/functions.php');
require_once('header.php');
$db=new BD('../class/base_stock/database');
$rows=$db->getTenFirstRows();
headerShow();
displayHome($rows);
?>
