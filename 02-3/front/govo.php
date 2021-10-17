<?php
  $title=$Que->find(['id'=>$_GET['id']]);
  $rows=$Que->all(['MID'=>$_GET['id']]);
?>
<form action="/api/vote.php" method="post">
<fieldset>
  <legend>首頁　＞　問卷調查　＞　<?=$title['text']?></legend>
  <h6><?=$title['text']?></h6>
  <input type="hidden" name="title" value="<?=$_GET['id']?>">
  <table>
    <?php 
      foreach($rows as $k => $row)
      {
        printf('<tr>');
        printf('<td><input type="radio" name="vote" value="%s">%s</td>',$row['id'],$row['text']);
        printf('</tr>');
      }
    ?>
  </table>
</fieldset>
<div class="ct"><input type="submit" value="我要投票"></div>
</form>