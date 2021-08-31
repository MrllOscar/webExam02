<!-- 複製POP留下fieldset、標題、form及後面按鈕 -->
<fieldset>
<form action="api/que.php" method="post">
  <legend>新增問卷</legend>
  <div>
    <div>問卷名稱<input type="text" name="title">
    </div>
    <div id="more">選項<input type="text" name="text[]"><input type="button" value="更多" onclick="more()"></div>
  </div>
  </table>
  <div><input type="submit" value="新增">|<input type="submit" value="清空"></div>
  </form>
</fieldset>

<!-- 多一欄的JQ可考慮前面90分鐘打完 -->
<script>
  function more(){
    let opt=`選項<input type="text" name="text[]"><br>`
    $('#more').prepend(opt);
  }

</script>
