<fieldset>
  <legend>會員註冊</legend>
  <form action="" method="post">
    <table>
      <tr>
        <td style="color:red">*請設定您要註冊的帳號及密碼(最常12個字元)</td>
      </tr>
      <tr>
        <td>Step1:登入帳號</td>
        <td><input type="text" name="acc[]" class="acc"></td>
      </tr>
      <tr>
        <td>Step2:登入密碼</td>
        <td><input type="password" name="pw[]" class="pw"></td>
      </tr>
      <tr>
        <td>Step3:再次確認密碼</td>
        <td><input type="password" name="pwck[]" class="pwck"></td>
      </tr>
      <tr>
        <td>Step4:信箱(忘記密碼時使用)</td>
        <td><input type="email" name="email[]" class="email"></td>
      </tr>
      <tr>
        <td><input type="button" class="in" value="註冊"><input type="reset" value="清除"></td>
      </tr>
    </table>
  </form>
</fieldset>
<script>
  $('.in').on('click', function() {
    let acc = $('.acc').val(),
      pw = $('.pw').val(),
      pwck = $('.pwck').val(),
      email = $('.email').val();
    if (acc == "" || pw == "" || pwck == "" || email == "") {
      alert("不可空白");
    } else {
      if(pw != pwck){
        alert('密碼錯誤');
      }else{
      $.post('api/acc.php', {
        acc
      }, (rr) => {
        if (rr >= 1) {
          alert('帳號重複');
        } else {
          $.post('api/in.php',{acc,pw,email},()=>{
            alert('註冊成功，歡迎加入');
            location.href="index.php";
          })
        }
      })
    }
    }
  })
</script>