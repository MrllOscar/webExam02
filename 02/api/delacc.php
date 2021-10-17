<?php include_once '../base.php';
  // var_dump($_POST);
  if(isset($_POST['del'])){
    foreach ($_POST['del'] as $id) {
      $User->del($id);
    }
  }
  to($_SERVER['HTTP_REFERER']);
  