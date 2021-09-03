<form action="api/newvote.php" method="post">
<fieldset>
  <legend>新增問卷</legend>
  <div>問卷名稱<input type="text" name="title"></div>
  <div id="morehere">選項<input type="text" name="text[]"><input type="button" value="更多" onclick="more()"></div>
  
  
  <div><input type="submit" value="新增"><input type="reset" value="清除"></div>
</fieldset>
</form>

<script>
  function more(){
    $("#morehere").prepend(`<div>選項<input type="text" name="text[]"></div>`)
  }
</script>


