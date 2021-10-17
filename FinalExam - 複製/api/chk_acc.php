<?php include_once '../base.php'; 

  // var_dump($Total->all());
  echo $Account->count(['acc'=>$_GET['acc']]);

  