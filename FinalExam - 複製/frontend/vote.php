<!-- 問題:如果get沒ID應該不能送出 -->
<?php if(!isset($_GET['id']))to('/index.php?do=que')?>
<fieldset>
  <form action="../api/vote.php" method="post">
  <?php $rows=$Que->find($_GET['id'])?>
  <legend>目前位置：首頁 > 問卷調查 > <?=$rows['text']?> </legend>
  <h4><?=$rows['text']?></h4>
  <table>
  <?php $row=$Que->all(['parent'=>$_GET['id']]);
    foreach ($row as $k => $v){
      printf('<tr><td><input type="radio" name="vote" value="%s">%s</td></tr>',$v['id'],$v['text']);
      printf('<input type="hidden" name="id" value="%s">',$_GET['id']);
    }
  ?>
    </table>
<div class="ct"><input type="submit" value="我要投票"></div>
</form>
</fieldset>
