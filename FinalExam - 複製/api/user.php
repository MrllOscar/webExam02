<?php include_once '../base.php'; 
if(isset($_POST['id']))
foreach($_POST['id'] as $v)
  $Account->del(['id'=>$v]);
  to($_SERVER['HTTP_REFERER']);