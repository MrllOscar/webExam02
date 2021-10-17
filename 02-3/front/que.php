<fieldset>
  <legend>首頁　＞　問卷調查　</legend>
  <table>
    <tr>
      <td>編號</td>
      <td>問卷題目</td>
      <td>投票總數</td>
      <td>結束</td>
      <td>狀態</td>
    </tr>
    <?php $rows=$Que->all(['MID'=>0]);
      foreach($rows as $k => $row)
      {
        printf('<tr>');
        printf('<td>%s</td>',$k+1);
        printf('<td>%s</td>',$row['text']);
        printf('<td>%s</td>',$row['vote']);
        printf('<td><a href="?do=ans&id=%s">結果</a></td>',$row['id']);
        if(!isset($_SESSION['admin'])){
          printf('<td>請先登入</td>');
        }else{
          printf('<td><a href="?do=govo&id=%s">參與投票</a></td>',$row['id']);
        }
        printf('</tr>');
      }
    ?>
  </table>
</fieldset>