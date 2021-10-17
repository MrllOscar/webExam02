<div class="ct">會員登入</div>
<form action="" method="post">
<table class="all">
  <tr >
    <td class="pp">帳號</td>
    <td class="tt"><input type="text" name="acc" class="acc"></td>
  </tr>
  <tr >
    <td class="pp">密碼</td>
    <td class="tt"><input type="text" name="pw" class="pw"></td>
  </tr>
</table>
<div class="ct"><input type="button" value="登入" class="login"><input type="reset" value="清除"><a href="?do=forget">忘記密碼</a>|<a href="?do=in">尚未註冊</a></div>
</form>
<script>
$('.login').on('click',()=>{
  let acc=$('.acc').val();
  let pw=$('.pw').val();
  $.post('/api/chkacc.php',{acc},(rrr)=>{
    if(rrr!=1){
    alert('查無帳號');
    location.reload();
  }else{
    $.post('/api/login.php',{acc,pw},(rr)=>{
      if(rr!=1){
        alert('密碼錯誤');
    location.reload();
      }else{
        if(acc == 'admin'){
          location.href="/backend.php";
        }else{
          location.href="/index.php";
        }
      }
    })
  }
  })
})
</script>