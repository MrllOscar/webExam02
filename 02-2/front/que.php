<fieldset>
  <legend>目前位置：首頁　＞問卷調查</legend>
  <table>
    <tr>
      <td>編號</td>
      <td style="width:50%">問卷題目</td>
      <td>投票總數</td>
      <td>結果</td>
      <td>狀態</td>
    </tr>
    <?php $rows=$Que->all(['MID'=>0]);
    foreach($rows as $k => $row){
      printf('<tr><td>%s</td>',$k+1);
      printf('<td>%s</td>',$row['text']);
      printf('<td>%s</td>',$Que->find(['id'=>$row['id']])['vote']);
      printf('<td><a href="?do=ans&id=%s">結果</a></td>',$row['id']);
    if(isset($_SESSION['admin'])){
      printf('<td><a href="?do=tovote&id=%s">參與投票</a></td>',$row['id']);
    }else{
      printf('<td>請先登入</td>');
    }
      printf('</tr>');
    }
    ?>
  </table>
</fieldset>