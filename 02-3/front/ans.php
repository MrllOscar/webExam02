<?php
  $title=$Que->find(['id'=>$_GET['id']]);
  $rows=$Que->all(['MID'=>$_GET['id']]);
?>
<fieldset>
  <legend>首頁　＞　問卷調查　＞　<?=$title['text']?></legend>
  <h6><?=$title['text']?></h6>
  <table>
    <?php 
      foreach($rows as $k => $row)
      {
        printf('<tr>');
        printf('<td>%s.%s</td>',$k+1,$row['text']);
        printf('<td style="width: 300px;"><div style="width: %s%%;background:gray;height:10px"></div></td>',round($row['vote']/$title['vote'],2)*100);
        printf('<td>%s票(%s%%)</td>',$row['vote'],round($row['vote']/$title['vote'],2)*100);
        printf('</tr>');
      }
    ?>
  </table>
</fieldset>
<div class="ct"><input type="button" value="返回" onclick="location.href='/index.php?do=que'"></div>