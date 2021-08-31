<style>
  .bblock{
    display: none;
  }
  td:first-child{
    width: 25%;
  }
</style>
<!-- 全部從0開始手刻，標題寫死 -->
<!-- 建立一個資料表欄位使用者ID跟文章ID來計算使用者是否對這筆文章按過讚 -->
<div>目前位置：首頁>最新文章區</div>
<table>
  <tr>
    <td>標題</td>
    <td>內容</td>
    <?= (isset($_SESSION['admin']))?'<td>人氣</td>':''?>
  </tr>
  <?php 
  $big=$Text->count();
  $small=5;
  $page=ceil($big/$small);
  $now=$_GET['p']??1;
  $start=($now-1)*$small;
  $rows=$Text->all("limit $start,$small");
  foreach($rows as $row)
  {
   ?>
  <tr>
    <td class="tag"><?=$row['title']?></td>
    <td><div class="sblock"><?=mb_substr($row['text'],0,30)?></div><div class="bblock"><?=$row['text']?></div></td>
    <?php 
    if(isset($_SESSION['admin'])){
    $hhh=$Vote->count(['username'=>$_SESSION['admin'],'AID'=>$row['id']]);
    if($hhh>0)
    printf('<td><a href="../api/votedown.php?id=%s">收回讚</a></td>',$row['id']);
    else
    printf('<td><a href="../api/voteup.php?id=%s">讚</a></td>',$row['id']);
    }
    ?>
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
      $('.tag').on('click',function(){
        $(this).parent().find(".sblock").toggle();
        $(this).parent().find(".bblock").toggle();
    })
</script>