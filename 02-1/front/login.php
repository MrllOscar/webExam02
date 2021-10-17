<fieldset>
  <legend>會員登入</legend>
  <form action="" method="post">
    <table>
      <tr>
        <td>帳號</td>
        <td><input type="text" name="acc" class="acc"></td>
      </tr>
      <tr>
        <td>密碼</td>
        <td><input type="password" name="pw" class="pw"></td>
      </tr>
      <tr>
        <td><input type="button" class="chk" value="登入"><input type="reset" value="清除"></td>
        <td><a href="?do=forget">忘記密碼</a>|<a href="?do=in">尚未註冊</a></td>
      </tr>
    </table>
  </form>
</fieldset>
<script>
  $('.chk').on('click', function() {
    let acc = $('.acc').val(),
      pw = $('.pw').val();
    $.post('api/acc.php', {
      acc
    }, (rr) => {
      if (rr != 1) {
        alert('帳號錯誤');
      } else {
        $.post('api/pw.php', {
          acc,
          pw
        }, (rrr) => {
          if (rrr != 1) {
            alert('密碼錯誤');
          } else {
            if (acc == 'admin') {
              location.href = 'backend.php';
            } else {
              location.href = 'index.php';
            }
          }
        })
      }
    })
  })
</script>