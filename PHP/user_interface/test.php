<?php
require_once('../class/BD.class.php');
$db=new BD('../class/base_stock/database');
$res=$db->test();
foreach($res as $r)
{
  echo "$r[titre_original]";
}
?>
