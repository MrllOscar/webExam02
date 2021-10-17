<fieldset>
  <legend>會員登入</legend>
  <form>
  <table>
    <tr>
      <td>帳號</td>
      <td><input type="text" id="acc" name="acc"></td>
    </tr>
    <tr>
      <td>密碼</td>
      <td><input type="password" id="pw" name="pw"></td>
    </tr>
    <tr>
      <td><input type="button" value="登入" onclick="chk()"><input type="reset" value="清除"></td>
      <td><a href="?do=forget">忘記密碼</a>|<a href="?do=register">尚未註冊</a></td>
      <!-- 連結錯誤<td><a href="forget.php">忘記密碼</a>|<a href="register.php">尚未註冊</a></td> -->
    </tr>
  </table>
  </form>
</fieldset>

<script>
  function chk(){
    let acc=$('#acc').val();
    let pw=$('#pw').val();
    $.get('api/chk_acc.php',{acc},(rr)=>{
      if(rr!=1){
        alert('查無帳號');
      }else{
        $.get('api/chk_pw.php',{acc,pw},(res)=>{
          if(res!=1){
            alert('密碼錯誤');
          }else{
            // 使用acc 就好 if($_GET['acc']=='admin'){
            if(acc=='admin'){
              location.href="backend.php";
            }else{
              location.href="index.php";
            }
          }
        })
      }
    })
  }
</script>