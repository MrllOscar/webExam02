<?php include_once '../base.php';
//帶入ID去判斷
foreach ($_POST['id'] as $id) {
  if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
    $Note->del($id);
  } else {
    // er 顯示語法
    $row=$Note->find($id);
    $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
    $Note->save($row);
  }
}
to($_SERVER['HTTP_REFERER']);
