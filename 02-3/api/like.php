<?php include_once '../base.php';
  $pop=$Pop->find(["id"=>$_GET['id']]);
  $pop['vote']++;
  $Pop->save($pop);
  $vote=$Vote->save(["vote"=>$_GET['id'],"acc"=>$_SESSION['admin']]);
  to($_SERVER['HTTP_REFERER']);