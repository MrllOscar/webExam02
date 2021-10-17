<?php session_start();
date_default_timezone_set("Asia/Taipei");

class DB{
  private $dns="mysql:host=localhost;charset=utf8;dbname=db02-3",$table,$pdo,$root="root",$pw="";

  function __construct($table)
  {
    $this->table=$table;
    $this->pdo=new PDO($this->dns,$this->root,$this->pw);
  }

  function all(...$arg)
  {
    $sql="SELECT * FROM $this->table";
    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $k => $v){
          $tmp[]=sprintf("`%s`='%s'",$k,$v);
        }
        $sql =$sql . " WHERE " .implode(' && ',$tmp);
      }else{
        $sql =$sql .$arg[0];
      }
    }
    if(isset($arg[1]))
    {
      $sql =$sql .$arg[1];
    }
    return $this->pdo->query($sql)->fetchAll();
  }
  
  function count(...$arg)
  {
    $sql="SELECT count(*) FROM $this->table";
    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $k => $v){
          $tmp[]=sprintf("`%s`='%s'",$k,$v);
        }
        $sql =$sql . " WHERE " .implode(' && ',$tmp);
      }else{
        $sql =$sql . $arg[0];
      }
    }
    if(isset($arg[1]))
    {
      $sql =$sql .$arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }

  function sum($col)
  {
    $sql="SELECT sum(`$col`) FROM $this->table";
    return $this->pdo->query($sql)->fetchColumn();
  }
  
  function find($id)
  {
    $sql="SELECT * FROM $this->table ";
      if(is_array($id)){
        foreach($id as $k => $v){
          $tmp[]=sprintf("`%s` = '%s'",$k,$v);
        }
        $sql =$sql . " WHERE " . implode(" && ",$tmp);
      }else{
        $sql =$sql ." WHERE `id` = '$id' ";
      }
      // echo $sql;
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }
    
  function del($id)
  {
    $sql="DELETE FROM $this->table";
      if(is_array($id)){
        foreach($id as $k => $v){
          $tmp[]=sprintf("`%s`='%s'",$k,$v);
        }
        $sql =$sql . " WHERE " .implode(' && ',$tmp);
      }else{
        $sql =$sql ." WHERE `id` = '$id'";
      }
    return $this->pdo->exec($sql);
  }
      
  function save($ar)
  {
      if(isset($ar['id'])){
        foreach($ar as $k => $v){
          if($k!='id')$tmp[]=sprintf("`%s`='%s'",$k,$v);
        }
        $sql = " UPDATE $this->table SET " .implode(' , ',$tmp) ." WHERE `id` = '{$ar['id']}'";
      }else{
        $sql = " INSERT INTO $this->table (`".implode("`,`",array_keys($ar))."`) VALUES ('".implode("','",$ar)."')";
      }
    return $this->pdo->exec($sql);
  }
}

function to($url)
{
  header('location:'.$url);
}

$Admin=new DB('admin');
$Bot=new DB('bot');
$Total=new DB('total');
$Pop=new DB('pop');
$Que=new DB('que');
$Vote=new DB('vote');

if(!$Total->count(["date"=>date("Y-m-d")]))
{
  $Total->save(["date"=>date("Y-m-d"),"total"=>0]);
}

if(!isset($_SESSION['total']))
{
  $today=$Total->find(["date"=>date("Y-m-d")]);
  $today['total']++;
  $Total->save($today);
  $_SESSION['total']=1;
}