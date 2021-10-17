<fieldset>
<legend>新增問卷</legend>
<form action="/api/que.php" method="post">
<div>問卷名稱  <input type="text" name="title"></div>
<div class="here">選項<input type="text" name="text[]"><input type="button" value="更多" class="more"></div>
<input type="submit" value="新增">|<input type="reset" value="清空">
</form>
</fieldset>
<script>
  $('.more').on('click',function(){
    $('.here').prepend('<div>選項<input type="text" name="text[]"></div>');
  })
</script>