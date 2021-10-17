<?php include_once '../base.php';
$db=new DB($_POST['table']);
unset($_POST['table']);
echo "<pre>";
print_r($_POST);
echo "</pre>";
foreach ($_POST['id'] as $index => $id){

  $db->find($id);
  if(isset($_POST['del']) && in_array($id,$_POST['del'])){
    $db->del($id);
  }else{
    $data=[];
    foreach(array_keys($_POST) as $key){
      if($key!='del')$data[$key]= $_POST[$key][$index];
    }
    if(isset($_POST['sh'])){
      $data['sh']=in_array($id,$_POST['sh'])?1:0;
    }
    if($_FILES){
      $file=$_FILES['img'];
      move_uploaded_file($file['tmp_name'],'../icon/'.$file['name']);
      $data['img']=$file['name'];
    }
    if($data){
      if(!$data['id'])unset($data['id']);
      $db->save($data);
    }
  }
}
to($_SERVER["HTTP_REFERER"]);