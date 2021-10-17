<?php include_once '../base.php';

$rows=$Admin->find(['acc'=>$_POST['acc']]);
if($rows['pw']==$_POST['pw']){
  echo '1';
$_SESSION['admin']=$_POST['acc'];
}
// echo $Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
// $who=$Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
// $_SESSION['user']==$who['acc'];