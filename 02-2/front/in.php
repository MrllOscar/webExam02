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