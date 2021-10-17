<fieldset>
  <legend>忘記密碼</legend>
  <form method="POST" action="api/forget.php">
  <table>
    <tr>
      <td>請輸入信箱以查詢密碼</td>
    </tr>
    <tr>
    <td><input type="text" id="email" name="email"></td>
    </tr>
    <tr>
    <td id="pw" ></td>
    </tr>
    <tr>
      <td><input type="button" value="尋找" onclick="forget()"></td>
    </tr>
  </table>
  </form>
</fieldset>

<script>
function forget(){
  let email=$('#email').val();
  $.post('api/forget.php',{email},(rr)=>{
    $('#pw').html(rr);
    //用html不是val
  })
}
</script>
