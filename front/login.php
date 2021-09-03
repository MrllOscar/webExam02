<form>
<fieldset>
  <legend>會員登入</legend>
  <table>
    <tr>
      <td>帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td>密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td><input type="button" id="submit" name="submit" value="登入"><input type="reset" name="submit" value="清除"></td>
      <td><a href="?do=forget">忘記密碼</a>|<a href="?do=in">尚未註冊</a></td>
    </tr>
  </table>
</fieldset>
</form>
<script>
$('#submit').on('click',function(){
  let acc=$('#acc').val(),
      pw=$('#pw').val();
  $.post('api/acc.php',{acc},(rr)=>{
    if(rr!=1){
      alert('查無帳號');
    }else{
  $.post('api/pw.php',{acc,pw},(rrr)=>{
      if(rrr!=1){
      alert('密碼錯誤');
      }else{
        if(acc=='admin'){
          location.href="/backend.php";
        }else{
          location.href="/index.php";
        }
      }
    })
    }
  })
})
</script>