<fieldset>
  <?php $rows=$Que->find($_GET['id'])?>
  <legend>目前位置：首頁 > 問卷調查 > <?=$rows['text']?> </legend>
  <h4><?=$rows['text']?></h4>
  <table>
  <?php $row=$Que->all(['parent'=>$_GET['id']]);
  // round語法及後面帶的2，style行內樣式和前面附上的寬度，如果除數是0的判斷式
    foreach ($row as $k => $v){
      printf('<tr><td>%s.%s</td>',$k+1,$v['text']);
      printf('<td style="width:100px"><span style="background:#777;width:%s%%;height:20px;display:inline-block;"></span></td>',($rows['vote']==0)?0:round($v['vote']/$rows['vote'],2)*100);
      printf('<td>%s票(%s%%)</td></tr>',$v['vote'],($rows['vote']==0)?0:round($v['vote']/$rows['vote'],2)*100);
    }
  ?>
    </table>
<div class="ct"><input type="button" value="返回" onclick="history.back()"></div>
</fieldset>
