﻿<?php include_once 'base.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-1.9.1.min.js"></script>
<script src="./js/js.js"></script>
</head>

<body>
<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>
<iframe name="back" style="display:none;"></iframe>
	<div id="all">
    	<div id="title">
        <?=date("m月d日 l")?>| 今日瀏覽: <?=$Total->find(['date'=>date('Y-m-d')])['total']?> | 累積瀏覽: <?=$Total->sum('total')?>  <a href="/index.php" style="float:right">回首頁</a></div>
        <div id="title2">
        	<img src="./icon/02B01.jpg" alt="健康促進網-回首頁">
        </div>
        <div id="mm">
        	<div class="hal" id="lef">
            	                	    <a class="blo" href="?do=po">帳號管理</a>
               	                     	    <a class="blo" href="?do=news">分類網誌</a>
               	                     	    <a class="blo" href="?do=pop">最新文章管理</a>
               	                     	    <a class="blo" href="?do=know">講座管理</a>
               	                     	    <a class="blo" href="?do=que">問卷管理</a>
               	                 </div>
            <div class="hal" id="main">
            	<div>
            		<marquee style="width:80%" >請民眾踴躍投稿電子報，讓電子報成為大家相互交流，分享的園地！詳見最新文章</marquee>
                	<span style="width:18%; display:inline-block;">
                  <?php if(!isset($_SESSION['admin'])){
                    echo '<a href="?do=login">會員登入</a>';
                  }else if($_SESSION['admin']=='admin'){
                      echo '歡迎，admin，<a href="/backend.php">管理</a>|<a href="./api/logout.php">登出</a>';
                    }else{
                      echo '歡迎，'.$_SESSION['admin'].'，<a href="./api/logout.php">登出</a>';
                    }
                  ?>
                    	                    	
                    	                    </span>
                    	<div class="">
                        <?php
                        $do = $_GET['do']??'home';
                        $files = "back/$do.php";
                        include_once file_exists($files)?$files:'back/home.php';
                        ?>
                		                        </div>
                </div>
            </div>
        </div>
        <div id="bottom">
    	    本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2021健康促進網社群平台 All Right Reserved 
    		 <br>
    		 服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
        </div>
    </div>

</body></html>