<?php $row=$Que->find($_GET['id'])?>
<div>目前位置：首頁 > 問卷調查 > <?=$row['text']?></div>
<h6> <?=$row['text']?></h6>
<table>
  <?php
    $voted=$Que->all(['parent'=>$_GET['id']]);
    foreach($voted as $k => $v){
      printf('<tr><td>%s.%s</td>',$k+1,$v['text']);
      printf('<td style="width:100px"><span style="display:inline-block;height:20px;width:%s%%;background:#777;"></span></td>',($row['vote']==0)?0:round($v['vote']/$row['vote'],2)*100);
      printf('<td>%s票(%s%%)</td></tr>',$v['vote'],($row['vote']==0)?0:round($v['vote']/$row['vote'],2)*100);
    }
  ?>
</table>
<div class="ct"><input type="button" onclick="history.back()" value="返回"></div>
<script>

</script>