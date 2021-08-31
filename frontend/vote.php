<form action="../api/vote.php" method="POST">
<?php $row=$Que->find($_GET['id'])?>
<div>目前位置：首頁 > 問卷調查 > <?=$row['text']?></div>
<h6> <?=$row['text']?></h6>
<table>
  <?php
    $voted=$Que->all(['parent'=>$_GET['id']]);
    foreach($voted as $v){
      printf('<tr><td><input name="vote" type="radio" value="%s">%s</td></tr>',$v['id'],$v['text']);
      printf('<input name="id" type="hidden" value="%s"></td></tr>',$_GET['id']);
    }
  ?>
</table>
<button>送出</button>
</form>
<script>

</script>