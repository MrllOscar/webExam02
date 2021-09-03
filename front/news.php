<style>
  .hb{
    display: none;
  }
</style>
<fieldset>
  <legend>目前位置：　首頁　＞　最新文章區</legend>
  <table>
    <tr>
      <th>標題</th>
      <th>內容</th>
      <?= (isset($_SESSION['user']))?'<th>人氣</th>':'' ?>
    </tr>
    <tr>
      <?php
        $big=$Text->count();
        $small=5;
        $now=$_GET['page']??1;
        $page=ceil($big/$small);
        $start=($now-1)*$small;
        $row = $Text->all(" limit $start,$small");
        // $like = $Good->all();/*** */
        foreach ($row as $v) {
          printf('<tr><td style="width:20%%">%s</td>',$v['title']);
          printf('<td class="sb">%s</td>',mb_substr($v['text'],0,30));
          printf('<td class="hb">%s</td>',$v['text']);
          if(isset($_SESSION['user'])){
            $like = $Good->count(['user'=>$_SESSION['user'],'good'=>$v['id']]);
          printf('<td>%s</td></tr>',($like>0)?'<a href="../api/unlike.php?id='.$v['id'].'">收回讚</a>':'<a href="../api/like.php?id='.$v['id'].'">讚</a>');
          // printf('<td>%s</td></tr>',(isset($like['user']) && $like['user']==$_SESSION['user'] && $like['good']==$v['id'])?'<a href="../api/unlike.php?id='.$v['id'].'">收回讚</a>':'<a href="../api/like.php?id='.$v['id'].'">讚</a>');
          }
        }
      ?>
    </tr>
  </table>
  <?php
  ($now-1>0)?printf('<a href="?do=news&page=%s"><</a>',$now-1):'';
  for($i=1;$i<= $page;$i++)printf('<a href="?do=news&page=%s" style="font-size:%s">%s</a>',$i,($i==$now)?'32px':'16px',$i);
  ($now+1<= $page)?printf('<a href="?do=news&page=%s">></a>',$now+1):'';
  ?>
</fieldset>

<script>
  $('.sb').on('click',function(){
    $(this).hide();
    $(this).parent().find('.hb').show();
  })
  $('.hb').on('click',function(){
    $(this).hide();
    $(this).parent().find('.sb').show();
  })
</script>