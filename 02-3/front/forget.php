<fieldset>
  <legend>忘記密碼</legend>
  <table>
    <tr>
      <td>請輸入信箱以查詢密碼</td>
    </tr>
    <tr>
      <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
      <td class="pwher"></td>
    </tr>
    <tr>
      <td><input type="button" class="gor" value="尋找"></td>
    </tr>
  </table>
</fieldset>
<script>
$('.gor').on('click',()=>{
  let email=$('#email').val();
  $.post('/api/forget.php',{email},(rrr)=>{
    $('.pwher').html(rrr);
  })
})
</script>