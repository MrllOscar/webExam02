<form action="/api/manage.php" method="post">
<fieldset>
  <table>
    <tr>
      <td>編號</td>
      <td>標題</td>
      <td>顯示</td>
      <td>刪除</td>
    </tr>
    <?php 
    $big=$Pop->count();
    $small=3;
    $page=ceil($big/$small);
    $now=$_GET['p']??1;
    $start=($now-1)*$small;
    $rows=$Pop->all(" LIMIT $start,$small");
    foreach ($rows as $k=> $row)
    {
      printf('<tr><td>%s</td>',$k+1+$start);
      printf('<td>%s</td>',$row['title']);
      printf('<td><input type="checkbox" name="sh[]" value="%s" %s><input type="hidden" name="id[]" value="%s"></td>',$row['id'],$row['sh']==1?'checked':'',$row['id']);
      printf('<td><input type="checkbox" name="del[]" value="%s"></td></tr>',$row['id']);
    }
    ?>
    <input type="hidden" name="table" value="pop">
  </table>
  <div class="ct">
  <?php
  if(($now-1)>0)printf('<a href="?do=pop&p=%s"><</a>',$now-1);
  for($i=1;$i<=$page;$i++)printf('<a href="?do=pop&p=%s" %s>%s</a>',$i,$now==$i?'style="font-size:36px"':'',$i);
  if($now+1<=$page)printf('<a href="?do=pop&p=%s">></a>',$now+1);
  ?>
  </div>
  <input type="submit" value="確定修改">
</fieldset>
</form>