<?php include_once 'base.php';
unset($_SESSION['total']);
$Total->save(["date"=>date("Y-m-d"),"total"=>0]);