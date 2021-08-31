<?php include_once '../base.php';

  $Vote->save(['username'=>$_SESSION['admin'],'AID'=>$_GET['id']]);
  $row=$Text->find($_GET['id']);
  $Text->save(['good'=>($row['good']+1),'id'=>$row['id']]);
    ?>
    <script>history.back()</script>