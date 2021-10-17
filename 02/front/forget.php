<div>請輸入信箱以查詢密碼</div>
<div><input type="text" name="email" id="email"></div>
<div id="pwhere"> </div>
<div><input type="button" onclick="email()" value="送出"></div>

<script>
function email(){
  let email=$('#email').val();
  $.post('api/forget.php',{email},(rrrr)=>{
      $('#pwhere').html(rrrr);

  })
}
</script>