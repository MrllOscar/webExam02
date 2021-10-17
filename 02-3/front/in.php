<div class="ct">註冊會員</div>
<form action="p" method="post">
<table class="all">
  <td>
    <td style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
  </td>
  <tr >
    <td class="pp">Step1:登入帳號</td>
    <td class="tt"><input type="text" name="acc[]" class="acc"></td>
  </tr>
  <tr >
    <td class="pp">Step2:登入密碼</td>
    <td class="tt"><input type="text" name="pw[]" class="pw"></td>
  </tr>
  <tr >
    <td class="pp">Step3:再次確認密碼</td>
    <td class="tt"><input type="text" name="ckpw[]" class="ckpw"></td>
  </tr>
    <tr>
    <td class="pp">Step4:信箱(忘記密碼時使用)</td>
    <td class="tt"><input type="text" name="email[]" class="email"></td>
  </tr>
</table>
<div class="ct"><input type="button" class="login" value="註冊"><input type="reset" value="清除"></div>
</form>
<script>
$('.login').on('click',()=>{
  let acc=$('.acc').val();
  let pw=$('.pw').val();
  let ckpw=$('.ckpw').val();
  let email=$('.email').val();
    if(acc ==""||pw ==""||ckpw==""||email==""){
    alert('不可空白');
  }else{
    if(pw!=ckpw){
      alert('密碼錯誤');
    }else{
      $.post('/api/chkacc.php',{acc},(rr)=>{
      if(rr==1){
        alert('帳號重複');
      }else{
        $.post('/api/in.php',{acc,pw,email},()=>{
          location.href="?do=login";
        })
      }
    })
    }
  }
})
</script>