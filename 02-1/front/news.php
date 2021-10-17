<style>
  .b{
    display: none;
  }
</style>
<fieldset>
<legend>目前位置：　首頁　＞　最新文章區</legend>
<table>
  <tr>
    <td>標題</td>
    <td>內容</td>
    <?php if(isset($_SESSION['admin'])){
    echo '<td></td>';
    }?>
  </tr>
  <?php 
      $big=$News->count();
      $small=5;
      $page=ceil($big/$small);
      $now=$_GET['p']??1;
      $start=($now-1)*$small;
      $rows=$News->all(['sh'=>1]," LIMIT $start,$small ");
      foreach($rows as  $row){
        printf('<tr><td style="width:35%%">%s</td>',$row['title']);
        printf('<td><pre class="p">%s</pre><pre class="b">%s</pre></td>',mb_substr($row['text'],0,15),$row['text']);
        if(isset($_SESSION['admin'])){
        printf('<td>%s</td>',($Vote->count(['acc'=>$_SESSION['admin'],'vote'=>$row['id']])>=1)?'<td><a href="../api/dislike.php?id='.$row['id'].'">收回讚</a></td>':'<td><a href="../api/like.php?id='.$row['id'].'">讚</a></td>');
        }
        printf('</tr>');
      }
      ?>
      
</table>
    <?php
    if($now-1>0)printf('<a href="?do=news&p=%s"><</a>',$now-1);
    for($i=1;$i<=$page;$i++)printf('<a href="?do=news&p=%s" %s>%s</a>',$i,($i==$now)?'style="font-size:32px"':'',$i);
    if($now+1<=$page)printf('<a href="?do=news&p=%s">></a>',$now+1);
?>
</fieldset>
<script>
  $('.p').on('click',function(){
    $(this).toggle();
    $(this).parent().find('.b').toggle();
  })
  $('.b').on('click',function(){
    $(this).toggle();
    $(this).parent().find('.p').toggle();
  })
</script>
