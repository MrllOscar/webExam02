<?php include_once '../base.php';
// var_dump($_POST);
  $plus=$Que->find($_POST['vote']);
  $plus['vote']++;
  $Que->save($plus);
  $totalVote=$Que->find($_POST['id']);
  $totalVote['vote']++;
  $Que->save($totalVote);
  to('/index.php?do=que');
    ?>