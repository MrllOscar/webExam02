<fieldset>
  <legend>目前位置：首頁 > 問卷調查</legend>
  <form>
    <table>
      <thead>
        <tr class="clo">
          <th>編號</th>
          <th>問卷題目</th>
          <th>投票總數</th>
          <th>結果</th>
          <th>狀態</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $rows=$Que->all(['parent'=>0,'sh'=>1]);
          // 注意必須要是單引號
          foreach($rows as $k => $v){
            printf('<tr><td class="ct">%s</td>',$k+1);
            printf('<td>%s</td>',$v['text']);
            printf('<td class="ct">%s</td>',$v['vote']);
            printf('<td><a href="?do=result&id=%s">結果</a></td>',$v['id']);
            printf('<td>%s</td></tr>',(isset($_SESSION['user']))?'<a href="?do=vote&id='.$v['id'].'">參與投票</a>':'請先登入');
          }
        ?>
      </tbody>
    </table>

  </form>
</fieldset>
