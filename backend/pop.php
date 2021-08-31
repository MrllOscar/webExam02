<!-- 複製帳號管理，增加checkbox跟hidden id欄位，判斷分頁 -->
<fieldset>
  <legend>最新文章管理</legend>
<form action="api/pop.php" method="POST">
  <table>
    <tr>
      <td>編號</td>
      <td>標題</td>
      <td>顯示</td>
      <td>刪除</td>
    </tr>
    <?php
      $big=$Text->count();
      //抓取最大數量
      $small=3;
      //每頁顯示的數量
      $page=ceil($big/$small);
      //算出總共幾頁
      $now=$_GET['p']??1;
      //帶入p參數讓網頁知道他第幾頁，沒有P參數顯示1
      $start=($now-1)*$small;
      //給予基礎值(第一頁0、第二頁3、第三頁6)
      $row=$Text->all("limit $start,$small");
      //搜尋出來的值帶入參數 (第幾個開始，顯示幾個)
      foreach($row as $k => $v){
        printf('<tr><td>%s</td>',$k+1+$start) ;
        printf('<td>%s</td>',$v['title']) ;
        printf('<td><input type="checkbox" name="sh[]" value="%s"%s></td>',$v['id'],($v['sh']==1)?'checked':'') ;
        printf('<input type="hidden" name="id[]" value="%s">',$v['id']) ;
        //不帶入隱藏id會讓欄位找不到id無法正常動作
        printf('<td><input type="checkbox" name="del[]" value="%s"></td></tr>',$v['id']) ;
      }      
    ?>

  </table>
  <div class="ct"><input type="submit" value="確定修改"></div>
</form>
<?php 
  ($now-1)>0?printf('<a href="backend.php?do=pop&p=%s"><</a>',$now-1):'';
  //上一頁按鈕
for($i=1;$i<=$page;$i++){
  printf('<a href="backend.php?do=pop&p=%s" style="font-size:%s">%s</a>',$i,($i==$now)?'32px':'16px',$i);
}
//要顯示的頁數
  ($now+1)<=$page?printf('<a href="backend.php?do=pop&p=%s">></a>',$now+1):'';
  //下一頁按鈕
?>


</fieldset>
