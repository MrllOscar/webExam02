<form action="api/news.php" method="post">
<fieldset>
  <legend>最新文章管理</legend>
  <input type="button" onclick="location.href='?do=addNote'" value="新增文章">
  <table>
    <thead>
    <tr >
      <th>編號</th>
      <th>標題</th>
      <th>顯示</th>
      <th>刪除</th>
    </tr>
    </thead>
      <?php 
      $big=$Note->count();
      $small=3;
      $page=ceil($big/$small);
      $now=$_GET['page']??1;
      $start=($now-1)*$small;
      $rows=$Note->all(" limit $start,$small");
      foreach($rows as $k => $v){
        printf('<tr><td class="clo ct">%s</td>',$k+1+$start);
        printf('<td class="ct">%s</td>', $v['title']);
        // er 字串替換語法，value一樣都是帶入id
        printf('<td class="ct"><input type="checkbox" name="sh[]" value="%s" %s></td>',$v['id'],($v['sh']==1)?'checked':'');
        // er 不帶入隱藏id會讓欄位找不到id無法正常動作
        printf('<input type="hidden" name="id[]" value="%s">',$v['id']) ;
        printf('<td class="ct"><input type="checkbox" name="del[]" value="%s"></td></tr>',$v['id']);
      }
      ?>
  </table>
  <?php
  ($now-1>0)?printf('<a href="?do=news&page=%s"><</a>',$now-1):'';
  for($i=1;$i<=$page;$i++)printf('<a href="?do=news&page=%s" style="font-size:%s">%s</a>',$i,$now==$i?'32px':'16px',$i);
  ($now+1<=$page)?printf('<a href="?do=news&page=%s">></a>',$now+1):'';
  ?>
  
  <div class="ct"><input type="submit" value="確定修改"></div>
</fieldset>
</form>
