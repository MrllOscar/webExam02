<style>
  .hb{
    display: none;
  }
  #alerr{
    overflow: auto;
  }
</style>
<fieldset>
  <legend>目前位置：首頁　＞　人氣文章區</legend>
  <table>
    <tr>
      <td>標題</td>
      <td>內容</td>
      <td></td>
    </tr>
    <?php 
    $big=$Pop->count();
    $small=5;
    $page=ceil($big/$small);
    $now=$_GET['p']??1;
    $start=($now-1)*$small;
    $rows=$Pop->all(["sh"=>1]," ORDER BY `vote` DESC LIMIT $start,$small");
    foreach ($rows as $k=> $row)
    {
      printf('<tr><td>%s</td>',$row['title']);
      printf('<td style="width:50%%"><span class="pb">%s</span>
      <div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
      <pre id="ssaa">%s</pre>
    </div></td>',mb_substr($row['text'],0,20),$row['text']);
      if(isset($_SESSION['admin'])){
      printf('<td>%s個人說<span class="good"></span>%s</td>',$row['vote'],($Vote->count(['acc'=>$_SESSION['admin'],'vote'=>$row['id']])==1)?'<a href="/api/dislike.php?id='.$row['id'].'">收回讚</a>':'<a href="/api/like.php?id='.$row['id'].'">讚</a>');
      }else{
        printf('<td>%s個人說<span class="good"></span></td>',$row['vote']);
      }
      printf('</tr>');
    }
    ?>
  </table>
  <?php
  if(($now-1)>0)printf('<a href="?do=pop&p=%s"><</a>',$now-1);
  for($i=1;$i<=$page;$i++)printf('<a href="?do=pop&p=%s" %s>%s</a>',$i,$now==$i?'style="font-size:36px"':'',$i);
  if($now+1<=$page)printf('<a href="?do=pop&p=%s">></a>',$now+1);
  ?>
</fieldset>

<script>
  $('tr').hover(function(){
    $(this).find('#alerr').toggle();
  },function(){
    $(this).find('#alerr').toggle();
  })
</script>
