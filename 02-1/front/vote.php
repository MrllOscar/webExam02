<style>
  .b{
    display: none;
  }
</style>
<fieldset>
<legend>目前位置：　首頁　＞　問卷調查 ＞ <?=$Que->find($_GET['id'])['text']?></legend>
<div><?=$Que->find($_GET['id'])['text']?></div>
<form action="api/vote.php" method="post">
<table>
  <?php 
      $rows=$Que->all(['sh'=>1,'MID'=>$_GET['id']]);
      foreach($rows as $k => $row){
        printf('<tr>');
        printf('<td><input type="radio" name="id" value="%s">%s</td>',$row['id'],$row['text']);
        printf('</tr>');
      }
      ?>
      
</table>
<div class="ct"><input type="submit" value="我要投票"></div>
</form>
</fieldset>
