<?php include_once '../base.php';
//整段語法，尤其顯示
foreach($_POST['id'] as $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
      //判斷ID有沒有在裡面
  $Text->del($id);
  }else{
    $row=$Text->find($id);
    $row['sh']=(isset($_POST['sh'])&& in_array($id,$_POST['sh']))?1:0;
    $Text->save($row);
  }
}
  to('../backend.php?do=pop')

?>