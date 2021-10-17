<style>
  .b{
    display: none;
  }
</style>
<fieldset>
<legend>目前位置：　首頁　＞　問卷調查 ＞ <?=$Que->find($_GET['id'])['text']?></legend>
<div><?=$Que->find($_GET['id'])['text']?></div>
<table>
  <?php 
      $rows=$Que->all(['sh'=>1,'MID'=>$_GET['id']]);
      foreach($rows as $k => $row){
        printf('<tr><td>%s</td>',$row['text']);
        printf('<td style="width:200px;height:20px"><div style="width:%s%%;height:20px;background:#555"></div><td>(%s%%)</td></td>',round($row['vote']/$Que->find($_GET['id'])['vote'],2)*100,round($row['vote']/$Que->find($_GET['id'])['vote'],2)*100);
        printf('</tr>');
      }
      ?>
      
</table>
<div class="ct"><input type="button" onclick="location.href='/index.php?do=que'" value="返回"></div>
</fieldset>
