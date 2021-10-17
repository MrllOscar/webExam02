<?php include_once '../base.php';
//帶入ID去判斷
// var_dump($_POST);
$rows=$Que->find($_POST['id']);
$row=$Que->find($_POST['vote']);
$rows['vote']++;
$row['vote']++;
$Que->save($rows);
$Que->save($row);
to('/index.php?do=que');