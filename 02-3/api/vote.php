<?php include_once '../base.php';
  $rows=$Que->find(['id'=>$_POST['title']]);
  $rows['vote']++;
  $Que->save($rows);
  $row=$Que->find(['id'=>$_POST['vote']]);
  $row['vote']++;
  $Que->save($row);
to("/index.php?do=ans&id={$rows['id']}");