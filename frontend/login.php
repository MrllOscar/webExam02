<form>
<fieldset>
  <legend>會員登入</legend>
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
      <td><input type="button" value="登入" onclick="login()"><input type="reset" value="清除"></td>
      <td><a href="?do=forget">忘記密碼</a>|<a href="?do=in">尚未註冊</a></td>
    </tr>
  </table>
</fieldset>
</form>
<script>
  function login() {
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    $.get("api/chk_acc.php", {acc}, (rac) => {
      if (rac != '1') {
        alert('查無帳號');
      } else {
        $.get("api/chk_pw.php", {acc,pw}, (rpw) => {
          if (rpw != '1') {
            alert('密碼錯誤');
          } else {
            if (acc == 'admin') {
              location.href = "backend.php";
            } else {
              location.href = "index.php";
            }
          }
        })
      }

    })
  }
</script>