<?php
$con = array('localhost','root','','crudnative');
$db = new mysqli($con[0],$con[1],$con[2],$con[3]);
if($db->connect_errno) {
  echo 'Connection Failed';
}

include 'class.php';
$data = new db($db);
