<fieldset>
  <legend>會員登入</legend>
  <form>
  <div>帳號：<input type="text" name="acc[]" class="acc"></div>
  <div>密碼：<input type="text" name="pw[]" class="pw"></div>
  <input type="button" value="登入" onclick="chk()">
  <input type="reset" value="清除">
  <span style="float:right"><a href="?do=forget">忘記密碼</a>|<a href="?do=in">尚未註冊</a></span>
  </form>
</fieldset>
<script>
  function chk(){
    let acc = $('.acc').val();
    let pw =$('.pw').val();
    $.post('../api/acc.php',{acc},(rr)=>{
      if(rr!=1){
        alert('查無帳號');
        console.log(acc);
      }else{
        $.post('../api/pw.php',{acc,pw},(rrr)=>{
          if(rrr!=1){
            alert('密碼錯誤');
          }else{
            if(acc=='admin'){
              location.href='/backend.php';
            }else{
              location.href='/index.php';
            }
          }
        })
      }
    })
  }
</script>