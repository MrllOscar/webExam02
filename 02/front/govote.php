<form action="../api/govote.php" method="post">
<fieldset>
  <legend>目前位置：　首頁　＞　問卷調查　＞　<?=$_GET['title']?></legend>
  <h6><?=$_GET['title']?></h6>
  <?php
    $row = $Vote->find(['text'=>$_GET['title']]);
    $rows = $Vote->all(['parent'=>$row['id']]);
    foreach ($rows as $v) {
      printf('<div><input type="radio" name="id" value="%s">%s</div>',$v['id'],$v['text']);
    }
  ?>
  <div class="ct"><button>我要投票</button></div>
</fieldset>
</form>

<script>
  
</script>