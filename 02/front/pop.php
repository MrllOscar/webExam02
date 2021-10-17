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
  <legend>目前位置：　首頁　＞　人氣文章區</legend>
  <table>
    <tr>
      <th>標題</th>
      <th>內容</th>
      <th>人氣</th>
    </tr>
    <tr>
      <?php
        $big=$Text->count();
        $small=5;
        $now=$_GET['page']??1;
        $page=ceil($big/$small);
        $start=($now-1)*$small;
        $row = $Text->all(" ORDER BY `good` DESC limit $start,$small");/*** */
        foreach ($row as $v) {
          printf('<tr><td style="width:20%%">%s</td>',$v['title']);
          printf('<td><dvi class="sb">%s</dvi><div class="hb">%s</div></td>',mb_substr($v['text'],0,30),$v['text']);
          if(isset($_SESSION['user'])){
            $like = $Good->count(['user'=>$_SESSION['user'],'good'=>$v['id']]);
          printf('<td>%s個人說<span class="good"></span>%s</td></tr>',$Good->count(['good'=>$v['id']]),($like>0)?'<a href="../api/unlike.php?id='.$v['id'].'">收回讚</a>':'<a href="../api/like.php?id='.$v['id'].'">讚</a>');
          }else{
          printf('<td>%s個人說<span class="good"></span></td></tr>',$Good->count(['good'=>$v['id']]));
          }
        }
      ?>
    </tr>
  </table>
  <?php
  ($now-1>0)?printf('<a href="?do=pop&page=%s"><</a>',$now-1):'';
  for($i=1;$i<= $page;$i++)printf('<a href="?do=pop&page=%s" style="font-size:%s">%s</a>',$i,($i==$now)?'32px':'16px',$i);
  ($now+1<= $page)?printf('<a href="?do=pop&page=%s">></a>',$now+1):'';
  ?>
</fieldset>

<script>
  $('tr').hover(function(){
    $(this).find('.hb').show();
  },function(){
    $(this).find('.hb').hide();
  })
</script>