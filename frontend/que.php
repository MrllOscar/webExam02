<div>目前位置：首頁 > 問卷調查</div>
<table>
  <tr>
    <th>編號</th>
    <th>問卷題目</th>
    <th>投票總數</th>
    <th>結果</th>
    <th>狀態</th>
  </tr>
  
  <?php
    $rows=$Que->all(['parent'=>0]);
    foreach($rows as $key => $row){
      printf('<tr><td>%s</td>',$key+1);
      printf('<td class="thetitle">%s</td>',$row['text']);
      printf('<td>%s</td>',$row['vote']);
      printf('<td><a href="?do=result&id=%s">結果</a></td>',$row['id']);
      printf('<td>%s</td></tr>',(isset($_SESSION['admin']))?'<a href="index.php?do=vote&id='.$row['id'].'">參與投票</a>':'請先登入');
    }
  ?>
  
</table>

<script>
  function voteVal(){
    let text=$(this).parent().parent().find('.thetitle').html();
    // console.log(text);
    // $.get('?do=result',{text})
  }
</script>