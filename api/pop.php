<?php include_once '../base.php';/**** */
foreach ($_POST['id'] as $id) {
  if(isset($_POST['del']) && in_array($id,$_POST['del'])){
    $Text->del($id);
  }else{
    $row=$Text->find($id);
    $row['sh']=((isset($_POST['sh']) && in_array($id,$_POST['sh'])))?1:0;
    $Text->save($row);
  }
  // if(isset($_POST['sh']) && in_array($id,$_POST['sh'])){
  //   $Text->save(['sh'=>1]);
  // }else{
  //   $Text->save(['sh'=>0]);
  // }
}
to($_SERVER['HTTP_REFERER']);
  