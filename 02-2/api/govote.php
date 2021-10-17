<?php include_once '../base.php';
$big=$Que->find(['id'=>$_POST['id']]);
$big['vote']++;
$Que->save(['id'=>$_POST['id'],'vote'=>$big['vote']]);
$rows=$Que->find(['id'=>$_POST['vote']]);
$rows['vote']++;
$Que->save(['id'=>$_POST['vote'],'vote'=>$rows['vote']]);
to("/index.php?do=que");