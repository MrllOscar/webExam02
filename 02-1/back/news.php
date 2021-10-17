<fieldset>
  <form action="api/manage.php" method="post">
    <table>
      <tr>
        <td>編號</td>
        <td>標題</td>
        <td>顯示</td>
        <td>刪除</td>
      </tr>
      <?php 
      $big=$News->count();
      $small=3;
      $page=ceil($big/$small);
      $now=$_GET['p']??1;
      $start=($now-1)*$small;
      $rows=$News->all(" LIMIT $start,$small ");
      foreach($rows as $k => $row){
        printf('<tr><td class="ct">%s</td>',$k+1+$start);
        printf("<td>%s</td>",$row['title']);
        printf('<td><input type="checkbox" name="sh[]" value="%s" %s>',$row['id'],($row['sh']==1)?'checked':'');
        printf('<td><input type="checkbox" name="del[]" value="%s"> <input type="hidden" name="id[]" value="%s"></td></tr>',$row['id'],$row['id']);
      }
      ?>
    </table>
    <input type="hidden" name="table" value="news">
    <?php
    if($now-1>0)printf('<a href="?do=news&p=%s"><</a>',$now-1);
    for($i=1;$i<=$page;$i++)printf('<a href="?do=news&p=%s" %s>%s</a>',$i,($i==$now)?'style="font-size=32px"':'',$i);
    if($now+1<=$page)printf('<a href="?do=news&p=%s">></a>',$now+1);
?>
    <div class="ct"><input type="submit" value="確定修改"><input type="reset" value="清空選取"></div>
  </form>
</fieldset>