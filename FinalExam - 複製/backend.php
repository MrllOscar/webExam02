<?php 
include_once 'base.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="shortcut icon" href="icon/favicon.ico" type="image/x-icon">

  <title>健康促進網</title>
  <link href="./css/css.css" rel="stylesheet" type="text/css">
  <script src="./js/jquery-1.9.1.min.js"></script>
  <script src="./js/js.js"></script>
  <style>
    tr>td{
      min-width:50px;
    }
  </style>
</head>

<body>
  <div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
    <pre id="ssaa"></pre>
  </div>
  <iframe name="back" style="display:none;"></iframe>
  <div id="all">
    <div id="title">
      <?=date("Y-m-d l")?> | 今日瀏覽: <?=$Total->find(['date'=>date("Y-m-d")])['total']?> | 累積瀏覽: <?=$Total->sum('total')?> </div>
    <div id="title2">
    <img src="icon/No2titleImg.jpg" alt="健康促進網－回首頁">
    </div>
    <div id="mm">
      <div class="hal" id="lef">
      <a class="blo" href="?do=register">帳號管理</a>
      <a class="blo" href="?do=news">最新文章管理</a>
      <a class="blo" href="?do=que">問卷調查管理</a>
    </div>
    <div class="hal" id="main">
      <div>
      <marquee style="width:64%; display:inline-block;">沒說要做跑馬燈(๑•́ ₃ •̀๑)</marquee>
        <span style="width:35%; display:inline-block;">
        <?php 
        if(isset($_SESSION['user'])){
          if($_SESSION['user']=='admin'){
            printf('歡迎，管理者，%s<a href="/backend.php"><input type="button" value="管理" ></a>|<a href="/index.php?do=logout"><input type="button" value="登出"></a>',$_SESSION['user']);
          }else{
            printf('歡迎，%s<br><a href="/index.php?do=logout"><input type="button" value="登出"></a>',$_SESSION['user']);
          }
        }else{
          echo '<a href="?do=login">會員登入</a>';
        }
        ?>
        
        </span>
        <div class="">
          <?php 
            $do = $_GET['do']??'home';
            $file = "backend/$do.php";
            include file_exists($file)?$file:"backend/home.php";
          ?>
        </div>
      </div>
    </div>
  </div>
  <div id="bottom">
    本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2012健康促進網社群平台 All Right Reserved
    <br>
    服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
  </div>
  </div>

</body>

</html>