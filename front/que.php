<style>
  .td{
    position: relative;
  }
  .hb{
    display: none;
    position: absolute;
    background: #777;
    color: #FFF;
    overflow: auto;
    width: 500px;
  }
</style>
<fieldset>
  <legend>目前位置：　首頁　＞　問卷調查</legend>
  <table>
    <tr>
      <th>編號</th>
      <th>問卷題目</th>
      <th>投票總數</th>
      <th>結果</th>
      <th>狀態</th>
    </tr>
    <tr>
      <?php
        $row = $Vote->all(['parent'=>0]);
        foreach ($row as $k => $v) {
          printf('<tr><td style="width:10%%">%s</td>',$k+1);
          printf('<td>%s</td>',$v['text']);
          printf('<td>%s</td>',$v['good']);
          printf('<td><a href="?do=result&title=%s">結果</a></td>',$v['text']);
          if(isset($_SESSION['user'])){
            $like = $Good->count(['user'=>$_SESSION['user'],'good'=>$v['id']]);
          printf('<td><a href="?do=govote&title=%s">參與投票</a></tr>',$v['text']);
          }else{
          printf('<td>請先登入</td></tr>');
          }
        }
      ?>
    </tr>
  </table>
</fieldset>
