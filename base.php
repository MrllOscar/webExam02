<?php
  session_start();
  date_default_timezone_set("Asia/Taipei");

class DB{
  private $dsn="mysql:host=localhost;charset=utf8;dbname=db02",
    $name="root",
    $password="",
    $table,
    $pdo;

  function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,$this->name,$this->password);
  }

  function all(...$arg){
    $sql="select * from $this->table " ;

    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $key=>$val){
          $tmp[]=sprintf("`%s`='%s'",$key,$val);
        }
        $sql=$sql . " where " . implode(" && ",$tmp);
      }else{
        $sql=$sql . $arg[0];
      }
      if(isset($arg[1])){
        $sql=$sql . $arg[1];
      }
    }
    return $this->pdo->query($sql)->fetchAll();
  }

  function count(...$arg){
    $sql="select count(*) from $this->table " ;
    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $key=>$val){
          $tmp[]=sprintf("`%s`='%s'",$key,$val);
        }
        $sql=$sql . " where " . implode(" && ",$tmp);
      }else{
        $sql=$sql . $arg[0];
      }
      if(isset($arg[1])){
        $sql=$sql . $arg[1];
      }
    }
    return $this->pdo->query($sql)->fetchColumn();
  }
  function find($id){
    $sql="select * from $this->table " ;
      if(is_array($id)){
        foreach($id as $key=>$val){
          $tmp[]=sprintf("`%s`='%s'",$key,$val);
        }
        $sql=$sql . " where " . implode(" && ",$tmp);
      }else{
        $sql=$sql . "where `id`='$id'";
      }
    
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }
  function del($id){
    $sql="delete from $this->table " ;
      if(is_array($id)){
        foreach($id as $key=>$val){
          $tmp[]=sprintf("`%s`='%s'",$key,$val);
        }
        $sql=$sql . " where " . implode(" && ",$tmp);
      }else{
        $sql=$sql . " where `id`='$id' ";
      }
    
    return $this->pdo->exec($sql);
  }
  function save($array){
    if(isset($array['id'])){
      foreach($array as $key=>$val){
        if($key!='id'){
        $tmp[]=sprintf("`%s`='%s'",$key,$val);
      }
    }
      $sql="update $this->table set ".implode(',',$tmp)." where `id`='{$array['id']}'";
    }else{
        $sql="insert into $this->table 
        (`".implode("`,`",array_keys($array))."`) values 
        ('".implode("','",array_values($array))."') 
        ";
      }
    
    return $this->pdo->exec($sql);
  }

  function sum($col){

      $sql="select sum(`$col`) from $this->table";
    
    return $this->pdo->query($sql)->fetchColumn();
  }


}
$Admin=new DB('admin');
$Total=new DB('total');
$Text=new DB('text');
$Que=new DB('que');
$Vote=new DB('vote');
// 如果找不到今天，存入今天total
if($Total->count(['date'=>date("Y-m-d")])<=0){
  $Total->save(['date'=>date("Y-m-d"),'total'=>1]);
}

//如果沒有SESSION，找到今天的日期，將total+1存回去，建立session
if(!isset($_SESSION['total'])){
  $todayTotal=$Total->find(['date'=>date("Y-m-d")]);
  $todayTotal['total']++;
  $Total->save($todayTotal);
  $_SESSION['total']=1;
}

function to ($url){
  header("location:".$url) ;
}