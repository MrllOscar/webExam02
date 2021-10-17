<fieldset>
  <legend>忘記密碼</legend>
<table>
  <tr>
    <td>請輸入信箱以查詢密碼</td>
  </tr>
  <tr>
    <td><input type="text" name="email" class="email"></td>
  </tr>
  <tr>
    <td class="em"></td>
  </tr>
  <tr>
    <td><input type="button" onclick="find()" value="尋找"></td>
  </tr>
</table>
</fieldset>

<script>
  function find(){
    let email=$('.email').val();
    $.post('../api/forget.php',{email},(rrr)=>{
      $('.em').html(rrr);
    })
  }
</script>