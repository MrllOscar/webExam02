<form action="api/user.php" method="post">
<fieldset>
  <legend>帳號管理</legend>
  <table class="tsb">
    <thead>
    <tr>
      <th class="clo">帳號</th>
      <th class="clo">密碼</th>
      <th class="clo">刪除</th>
    </tr>
    </thead>
    
      <?php 
      $rows=$Account->all();
      foreach($rows as $k => $v){
        printf('<tr><td class="ct">%s</td>',$v['acc']);
        printf('<td class="ct">%s</td>', str_repeat('*',mb_strlen($v['pw'])));
        // er 字串替換語法
        printf('<td class="ct"><input type="checkbox" name="id[]" value="%s"></td></tr>',$v['id']);
      }
      ?>
  </table>
  <div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清除選取"></div>
</fieldset>
</form>

<fieldset>
  <legend>新增會員</legend>
  <form>
    <table>
      <tr>
        <td style="color: red;">*請設定您要註冊的帳號及密碼(最長 12 個字元)</td>
      </tr>
      <tr>
        <td class="clo r">帳號:</td>
        <td><input type="text" id="acc" name="acc"></td>
      </tr>
      <tr>
        <td class="clo r">密碼:</td>
        <td><input type="password" id="pw" name="pw"></td>
      </tr>
      <tr>
        <td class="clo r">確認密碼:</td>
        <td><input type="password" id="chkpw" name="chkpw"></td>
      </tr>
      <tr>
        <td class="clo r">信箱:</td>
        <td><input type="email" id="email" name="email"></td>
      </tr>
      <tr>
        <td><input type="button" value="註冊" onclick="register()">
          <input type="reset" value="清除">
        </td>
      </tr>
    </table>
  </form>
</fieldset>

<script>
  function register() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let chkpw = $('#chkpw').val();
    let email = $('#email').val();
    if (acc == '' || pw == '' || chkpw == '' || email == '') {
      alert('不可空白');
    } else {
      $.get('api/chk_acc.php', {
        acc
      }, (rr) => {
        if (rr == 1) {
          alert('帳號重複');
        } else {
          $.post('api/register.php', {acc,pw,email},()=>{
            alert('註冊完成，歡迎加入');
            location.reload();
          })
        }
      })
    }
  }
</script>