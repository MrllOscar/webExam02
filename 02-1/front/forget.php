<fieldset>
  <table>
    <tr>
      <td>請輸入信箱以查詢密碼</td>
    </tr>
    <tr>
      <td><input type="text" name="email" class="email"></td>
    </tr>
    <tr>
      <td class="show"></td>
    </tr>
    <tr>
      <td><input type="button" value="尋找" class="fi"></td>
    </tr>
  </table>
</fieldset>
<script>
  $('.fi').on('click',function(){
    let email=$('.email').val();
    $.post('api/email.php',{email},(rr)=>{
    })
  })
</script>