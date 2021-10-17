<form action="api/addNote.php" method="post">
<fieldset>
  <legend>新增文章</legend>
  <table>
    <tr>
      <td>文章標題</td>
      <td><input type="text" name="title"></td>
    </tr>
    <tr>
      <td>文章分類</td>
      <td><select name="type">
        <option value="健康新知">健康新知</option>
        <option value="菸害防治">菸害防治</option>
        <option value="癌症防治">癌症防治</option>
        <option value="慢性病防治">慢性病防治</option>
      </select></td>
    </tr>
    <tr>
      <td>文章內容</td>
      <td><input type="text" name="text" style="width: 300px; height:300px"></td>
    </tr>
  </table>
  
  <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</fieldset>
</form>