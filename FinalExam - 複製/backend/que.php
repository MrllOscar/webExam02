<!-- er 用div去製作非table -->
<fieldset>
  <legend>新增問卷</legend>
  <form action="api/que.php" method="POST">
    <div>
      <div>問卷名稱<input type="text" name="title"></div>
    </div>
    <div id="more" class="clo" style="padding: 0 3px;">選項<input type="text" name="text[]"><input type="button" value="更多" onclick="more()">
    </div>
    <input type="submit" value="新增">|<input type="reset" value="清空">
  </form>
</fieldset>

<fieldset>
  <legend>問卷列表</legend>
  <table>
    <thead>
      <tr class="clo">
        <th>問卷名稱</th>
        <th>投票數</th>
        <th>開放</th>
      </tr>
    </thead>
    <tbody>
        <?php
          $rows=$Que->all(['parent'=>0]);
          // 注意必須要是單引號
          foreach($rows as $k => $v){
            printf('<td>%s</td>',$v['text']);
            printf('<td class="ct">%s</td>',$v['vote']);
            printf('<td><input type="button" name="sh[]" value="%s" onclick="visibility(%s)"><input type="hidden" name="id[]" value="%s"></td></tr>',
            ($v['sh']==1)?'開放':'關閉',$v['id'],$v['id']);
          }
        ?>
        
      </tbody>
    </table>

</fieldset>



<script>
  // 不考慮邏輯性新增直接寫出自己要的東西，可排除掉btn在內的困難 
  function more() {
    $('#more').prepend('<div>選項<input type="text" name="text[]"></div>');
  }

  function visibility(id){
    $.post('../api/visibility.php',{id},function(rr){
      if(rr==1){
        $(this).val('開放');
      }else{
        $(this).val('關閉');
      }
      location.reload();
    }
    )
      }
</script>