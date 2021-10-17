<style>
  .hb{
    display: none;
  }
</style>
<fieldset>
  <legend>目前位置：首頁　＞　最新文章區</legend>
<table>
  <tr>
    <td>標題</td>
    <td>內容</td>
    <td></td>
  </tr>
  <?php 
    $big=$Pop->count();
    $small=4;
    $page=ceil($big/$small);
    $now=$_GET['p']??'1';
    $start=($now-1)*$small;
    $rows=$Pop->all("limit $start,$small");
  foreach($rows as $row){
    printf('<tr class="tb"><td>%s</td>',$row['title']);
    printf('<td><span class="pb">%s</span><pre class="hb">%s</pre></td>',mb_substr($row['text'],0,20),$row['text']);
  if(isset($_SESSION['admin'])){
    printf('<td>%s</td>',($Vote->count(['acc'=>$_SESSION['admin'],'vote'=>$row['id']])>=1)?'<a href="../api/unlike.php?id='.$row['id'].'">收回讚</a>':'<a href="../api/like.php?id='.$row['id'].'">讚</a>');
  }
    printf('</tr>');
  }
  ?>
</table>
<?php
  if(($now-1)>0)printf('<a href="?do=news&p=%s">< </a>',$now-1);
  for($i=1;$i<=$page;$i++){printf('<a href="?do=news&p=%s" %s> %s </a>',$i,($now==$i)?'style="font-size:36px;"':'',$i);}
  if(($now+1)<=$page)printf('<a href="?do=news&p=%s">></a>',$now+1);
?>
</fieldset>
<script>
$('.tb').on('click',function(){
  $(this).find('.pb').toggle();
  $(this).find('.hb').toggle();
})
</script>
