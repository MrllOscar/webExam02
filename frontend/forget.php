<?php include_once "base.php"; ?>

<table>
  <tr>
    <td>請輸入信箱以查詢密碼</td>
  </tr>
  <tr>
    <td><input type="email" name="email" id="email"></td>
  </tr>
  <tr>
    <td id="here"></td>
  </tr>
  <tr>
    <td><input type="button" value="尋找" onclick="emailpw()"></td>
  </tr>
</table>

<script>
  function emailpw(){
    let e=$("#email").val();
    // if
    $.get("api/forget.php",{e},(rrr)=>{
      $('#here').html(rrr);
    })
  }
</script>