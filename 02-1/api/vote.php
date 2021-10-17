<?php include_once '../base.php';

$rows=$Que->find($_POST['id']);
$rows['vote']++;
$Que->save(['id'=>$_POST['id'],'vote'=>$rows['vote']]);
$row=$Que->find($rows['MID']);
$row['vote']++;
$Que->save(['id'=>$rows['MID'],'vote'=>$row['vote']]);
to("/index.php?do=a&id={$rows['MID']}");
// echo "?do=a&id={$rows['MID']}";