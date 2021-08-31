<?php include_once '../base.php';

$acc=$_GET['acc'];
echo $Admin->count(['acc'=>$acc]);



?>