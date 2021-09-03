<form action="api/delacc.php" method="post">
<fieldset>
  <legend>帳號管理</legend>
  <table>
  <tr>
    <th>帳號</th>
    <th>密碼</th>
    <th>刪除</th>
  </tr>
  <?php
  $rows=$User->all();
  foreach($rows as $v){
    printf('<tr><td>%s</td>',$v['acc']);
    printf('<td>%s</td>',$v['pw']);
    printf('<td><input type="checkbox" name="del[]" value="%s"></td></tr>',$v['id']);
  }
  ?>
</table>
<div><input type="submit" value="確定刪除"><input type="reset" value="清除選取"></div>
</fieldset>
</form>
<form>
  <fieldset>
    <legend>會員註冊</legend>
    <table>
      <tr>
        <td>Step1:登入帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
      </tr>
      <tr>
        <td>Step2:登入密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
      </tr>
      <tr>
        <td>Step3:再次確認密碼</td>
        <td><input type="password" name="ckpw" id="ckpw"></td>
      </tr>
      <tr>
        <td>Step4:信箱(忘記密碼時使用)</td>
        <td><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td><input type="button" id="submit" name="submit" value="註冊"><input type="reset" name="submit" value="清除"></td>
      </tr>
    </table>
  </fieldset>
</form>
<script>
  $('#submit').on('click', function() {
    let acc = $('#acc').val(),
      pw = $('#pw').val(),
      ckpw = $('#ckpw').val(),
      email = $('#email').val();
    if (acc == '' || pw == '' || ckpw == '' || email == '') {
      alert('不可空白')
    } else {
      $.post('api/acc.php', {
        acc
      }, (rr) => {
        if (rr == 1) {
          alert('帳號重複');
        } else {
          if (ckpw != pw) {
            alert('密碼錯誤');
          } else {
            $.post('api/in.php', {
              acc,
              pw,
              email
            }, () => {
              alert('註冊完成，歡迎加入');
              location.href = "/index.php?do=login";
            });
          }
        }
      })
    }
  })
</script>
