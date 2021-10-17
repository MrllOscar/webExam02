<?php include_once '../base.php';
//帶入ID去判斷
$rows=$Que->find($_POST['id']);
$rows['sh']=($rows['sh']==1)?0:1;
$Que->save($rows);
echo $rows['sh'];
