<!-- 複製news頁面 -->
<style>
  .bblock{
    display: none;
  }
  td:first-child{
    width: 25%;
  }
</style>
<div>目前位置：首頁>人氣文章區</div>
<!-- 記得改名字 -->
<table>
  <tr>
    <td>標題</td>
    <td>內容</td>
    <td>人氣</td>
  </tr>
  <?php 
  $big=$Text->count();
  $small=5;
  $page=ceil($big/$small);
  $now=$_GET['p']??1;
  $start=($now-1)*$small;
  // sql語法要用背的
  $rows=$Text->all(['sh'=>1]," order by `good` desc limit $start,$small");
  foreach($rows as $row)
  {
   ?>
  <tr>
    <!-- tag搬下去，relative跟absolute屬性附加 -->
    <td ><?=$row['title']?></td>
    <td class="tag" style="position: relative;"><div class="sblock"><?=mb_substr($row['text'],0,30)?></div><div class="bblock" style="position: absolute;z-index:10;background:gray;color:#FFF;"><?=$row['text']?></div></td>
    <!-- 新增這行把裡面td刪掉 -->
    <td><?=$row['good']?>個人說讚<span class="good"></span>
    <?php 
    if(isset($_SESSION['admin'])){
    $hhh=$Vote->count(['username'=>$_SESSION['admin'],'AID'=>$row['id']]);
    if($hhh>0)
    printf('<a href="../api/votedown.php?id=%s">收回讚</a>',$row['id']);
    else
    printf('<a href="../api/voteup.php?id=%s">讚</a>',$row['id']);
    }
    ?>
    </td>
  </tr>
  <?php } ?>

</table>
<?php
  ($now-1>0)?printf('<a href="?do=news&p=%s"><</a>',$now-1):'';
  for($i=1;$i<= $page;$i++){
    printf('<a href="?do=news&p=%s" style="font-size:%s">%s</a>',$i,($now==$i)?'32px':'16px',$i);
  }
  ($now+1<= $page)?printf('<a href="?do=news&p=%s">></a>',$now+1):'';
?>

<script>
  // 改成hover(function)執行
      $('.tag').hover(function(){
        $(this).find(".bblock").show();
      },function(){
        $(this).find(".bblock").hide();
      })
</script>