<fieldset>
  <legend>目前位置：首頁　＞　問卷調查　＞　<span class="word"><?=$Que->find(['id'=>$_GET['id']])['text']?></span></legend>
  <h5><?=$Que->find(['id'=>$_GET['id']])['text']?></h5>
  <form action="api/govote.php" method="post">
  <table>
  <?php $rows=$Que->all(['MID'=>$_GET['id']]);
  foreach($rows as $k => $row){
    printf('<tr><td><input type="radio" name="vote" value="%s">%s</td></tr>',$row['id'],$row['text']);
  }
  ?>
  <input type="hidden" name="id" value="<?=$_GET['id']?>">
  </table>
  <input type="submit" value="我要投票">
  </form>
</fieldset>

<script>

</script>