<fieldset>
  <legend>帳號管理</legend>
  <form action="../api/manage.php" method="post">
  <table style="width: 100%;" class="ct">
    <tr>
      <td>帳號</td>
      <td>密碼</td>
      <td>刪除</td>
    </tr>
    <?php $rows=$Admin->all();
      foreach($rows as $row){
        printf('<tr><td>%s</td>',$row['acc']);
        printf('<td>%s</td>',$row['pw']);
        printf('<td><input type="checkbox" name="del[]" value="%s"><input type="hidden" name="id[]" value="%s"></td></tr>',$row['id'],$row['id']);
      }
    ?>
  <input type="hidden" name="table" value="admin">
  </table>
  <div class="ct">
  <input type="submit" value="確認刪除">
  <input type="reset" value="清空選取">
  </div>
  </form>
</fieldset>
<fieldset>
  <legend>會員註冊</legend>
  <form>
  <div>Step1:帳號<input type="text" name="acc[]" class="acc"></div>
  <div>Step2:密碼<input type="text" name="pw[]" class="pw"></div>
  <div>Step3:再次確認密碼<input type="text" class="ckpw"></div>
  <div>Step4:信箱(忘記密碼時使用)<input type="text" name="email[]" class="email"></div>
  <input type="button" value="註冊" onclick="chk1()">
  <input type="reset" value="清除">
  </form>
</fieldset>
<script>
  function chk1(){
    let acc = $('.acc').val();
    let pw =$('.pw').val();
    let ckpw =$('.ckpw').val();
    let email =$('.email').val();
    if(acc == ""||pw==""||ckpw==""||email==""){
      alert('不可空白');
    }else{
    $.post('../api/acc.php',{acc},(rr)=>{
        if(rr==1){
        alert('帳號重複');
        console.log(acc);
      }else{
          if(pw!=ckpw){
            alert('密碼錯誤');
          }else{
            $.post('api/in.php',{acc,pw,email},(rrr)=>{
              alert('註冊完成，歡迎加入');
              location.href="/index.php";
            })
          }
      }
    })
  }
  }
</script>