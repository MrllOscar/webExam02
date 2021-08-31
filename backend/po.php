<!-- 上面手刻，下方複製註冊會員不用修改 -->
<fieldset>
  <legend>帳號管理</legend>
<form action="api/po.php" method="POST">
  <table>
    <tr>
      <td>帳號</td>
      <td>密碼</td>
      <td>刪除</td>
    </tr>
    

    <?php
      $row=$Admin->all();
      foreach($row as $v){
        echo '<tr><td>'.$v['acc'].'</td>';
        echo '<td>'.str_repeat('*',strlen($v['pw'])).'</td>';
        echo '<td><input type="checkbox" name="del[]" value="'.$v['id'].'"></td></tr>';
      }
      
    ?>
    

    <tr>
      
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
  <div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div>
</form>
<form>
</fieldset>

  <fieldset>
  <legend>新增會員</legend>
  <table>
    <tr>
      <td style="color:red">*請設定您要的註冊帳號及密碼(最長12個字元)</td>
    </tr>
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
      <td><input type="password" id="chk"></td>
    </tr>
    <tr>
      <td>Step4:信箱(忘記密碼時使用)</td>
      <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
      <td><input type="button" value="註冊" id="submit"></td>
      <td><input type="reset" value="清除"></td>
    </tr>
  </table>
</fieldset>
</form>

<script>
  $('#submit').on('click', function() {
    let acc = $('#acc').val(),
      pw = $('#pw').val(),
      email = $('#email').val(),
      chk = $('#pw').val();
      console.log(acc,pw,email,chk)
    if (acc == '' || pw == '' || chk == '' || email == '') {
      alert('不可空白')
    } else if (chk != pw) {
      alert('密碼錯誤');
    } else {
      $.get('api/chk_acc.php', {
        acc
      }, (rrr) => {
        if (rrr == '1') {
          alert('帳號重複');
        } else {
          $.post('api/in.php', {
            acc,
            pw,
            email
          }, (rgg) => {
            if (rgg = '1') {
              alert('註冊完成');
            } else {
              alert('註冊失敗，請洽管理員');
            }
          })
        }
      })
    }
  })
</script>