<?php include_once '../base.php';
if($Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']])){
echo 1;
$_SESSION['admin']=$_POST['acc'];
}