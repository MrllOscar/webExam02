<fieldset>
  <legend>目前位置：　首頁　＞　問卷調查　＞　<?=$_GET['title']?></legend>
  <h6><?=$_GET['title']?></h6>
  <table>

  <?php
    $row = $Vote->find(['text'=>$_GET['title']]);
    $rows = $Vote->all(['parent'=>$row['id']]);
    foreach ($rows as $v) {
      printf('<tr><td>%s</td>',$v['text']);
      printf('<td style="width:100px"><div style="width:%s%%;background:#aaa;height:10px"></div></td><td>%s票(%s%%)</td></tr>',round($v['good']/$row['good'],2)*100,$v['good'],round($v['good']/$row['good'],2)*100);
    }
  ?>
  <!-- /***/div顯示寬度 -->
  </table>

  <div class="ct"><input type="button" value="返回" onclick="history.back()"></div>
</fieldset>
</form>

<script>
  
</script>