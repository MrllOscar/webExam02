<fieldset>
  <legend>目前位置：首頁　＞　問卷調查　＞　<span class="word"><?=$Que->find(['id'=>$_GET['id']])['text']?></span></legend>
  <h5><?=$Que->find(['id'=>$_GET['id']])['text']?></h5>
  <table>
  <?php $rows=$Que->all(['MID'=>$_GET['id']]);
  foreach($rows as $k => $row){
//     echo "<pre>";
// print_r($row);
// echo "</pre>";
    printf('<tr><td>%s.%s</td>',$k+1,$row['text']);
    printf('<td style="width:300px;height:10px"><div style="width:%s%%;height:10px;background:gray;"></div></td>',round($row['vote']/$Que->find(['id'=>$_GET['id']])['vote'],2)*100);
    printf('<td>%s票(%s%%)</td></tr>',$row['vote']??0,round($row['vote']/$Que->find(['id'=>$_GET['id']])['vote'],2)*100);
  }
  ?>
  </table>
  <input type="button" value="返回" onclick='location.href="/index.php?do=que"'>
</fieldset>

<script>

</script>