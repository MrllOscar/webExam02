<style>
  .sb{
    cursor: pointer;
  }
  .hb{
    display: none;
    cursor: pointer;
  }

</style>
<fieldset>
  <legend>目前位置：首頁 > 最新文章區</legend>
  <form>
    <table>
      <thead>
        <tr>
          <th>標題</th>
          <th>內容</th>
          <?= (isset($_SESSION['user'])) ? "<th>人氣</th>" : '' ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $big=$Note->count();
        $small = 5;
        $page = ceil($big / $small);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $small;
        $rows = $Note->all(" limit $start,$small ");
        foreach ($rows as $v) {
          printf('<tr><td class="clo">%s</td>', $v['title']);
          printf('<td><pre class="sb">%s</pre><pre class="hb">%s</pre></td>', mb_substr($v['text'], 0, 30),$v['text']);
          if (isset($_SESSION['user'])) {
            $likethis = $Vote->count(['username' => $_SESSION['user'], 'favorite' => $v['id']]);
            if ($likethis > 0) {
              printf('<td><a href="../api/unlike.php?id=%s">收回讚</a></td></tr>', $v['id']);
            } else {
              printf('<td><a href="../api/like.php?id=%s">讚</a></td></tr>', $v['id']);
            }
          } 
        }
        ?>
      </tbody>
    </table>
    <?php
    ($now - 1 > 0) ? printf('<a href="?do=news&p=%s"><</a>', $now - 1) : '';
    for ($i = 1; $i <= $page; $i++) {
      printf('<a href="?do=news&p=%s" style="font-size:%s">%s</a>', $i, ($now == $i) ? '32px' : '16px', $i);
    }
    ($now + 1 <= $page) ? printf('<a href="?do=news&p=%s">></a>', $now + 1) : '';
    ?>
  </form>
</fieldset>

<script>
  $("pre").on('click',function(){
    $(this).parent().find(".hb").toggle();
    $(this).parent().find(".sb").toggle();
  })
</script>