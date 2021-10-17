<fieldset>
  <legend>新增問卷</legend>
  <form action="../api/que.php" method="post">
  <div>問卷名稱 <input type="text" name="title"></div>
  <div class="here">選項<input type="text" name="text[]"><input type="button" onclick="more()" value="更多"></div>
  <button>新增</button>|<input type="reset" value="清空">
  </form>
</fieldset>
<script>
  function more(){
    $('.here').prepend(`選項<input type="text" name="text[]"></br>`)
  }
</script>