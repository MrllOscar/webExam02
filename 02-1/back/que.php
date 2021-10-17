<fieldset>
<legend>新增問卷</legend>
<form action="api/newque.php" method="post">
<div>問卷名稱<input type="text" name="title"></div>
<div class="wowo">選項<input type="text" name="text[]"><input type="button" onclick="more()" value="更多"></div>
<div><input type="submit" value="新增"><input type="reset" value="清空"></div>
<input type="hidden" name="table" value="que"><input type="hidden" name="id[]" value="">
</form>
</fieldset>
<script>
  function more(){
    $('.wowo').prepend(`<div>選項<input type="text" name="text[]"></div>`)
  }
</script>