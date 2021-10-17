<?php include_once '../base.php';
$Note->save($_POST);
to('/backend.php?do=news');
