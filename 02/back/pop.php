<form action="api/pop.php" method="post">
<fieldset>
  <legend>帳號管理</legend>
  <table>
  <tr>
    <th>編號</th>
    <th>標題</th>
    <th>顯示</th>
    <th>刪除</th>
  </tr>
  <?php
  $big=$Text->count();
  $small=3;
  $now=$_GET['page']??1;
  $page=ceil($big/$small);
  $start=($now-1)*$small;
  $rows=$Text->all(" limit $start,$small");
  foreach($rows as $k => $v){
    printf('<tr><td>%s</td>',$k+1+$start);
    printf('<td>%s</td>',$v['title']);
    printf('<td><input type="checkbox" name="sh[]" value="%s" %s></td>',$v['id'],($v['sh']==1)?'checked':'');
    printf('<input type="hidden" name="id[]" value="%s">',$v['id']);
    printf('<td><input type="checkbox" name="del[]" value="%s"></td>',$v['id']);
  }
  ?>
</table>

<?php
  ($now-1>0)?printf('<a href="?do=pop&page=%s"><</a>',$now-1):'';
  for($i=1;$i<= $page;$i++)printf('<a href="?do=pop&page=%s" style="font-size:%s">%s</a>',$i,($i==$now)?'32px':'16px',$i);
  ($now+1<= $page)?printf('<a href="?do=pop&page=%s">></a>',$now+1):'';
  ?>
<div><input type="submit" value="確定修改"></div>
</form>
</fieldset>


