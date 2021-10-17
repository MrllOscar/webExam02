<?php
    date_default_timezone_set('Asia/Taipei');
    session_start();

    class DB{
      // err7 charset:utf8錯誤
      private $dns="mysql:host=localhost;charset=utf8;dbname=ab13",
      $root="root",
      $pw="",
      $table,
      $pdo;

      function __construct($table)
      {
        $this->table=$table;
        $this->pdo=new PDO($this->dns,$this->root,$this->pw);
      }

      function all(...$arg)
      {
        $sql = "SELECT * FROM $this->table ";
        if(isset($arg[0])){
          if(is_array($arg[0])){
            foreach($arg[0] as $k => $v){
              $tmp[]=sprintf("`%s` = '%s'",$k,$v);
            }
            $sql = $sql . " where " . implode(" && ",$tmp);
          }else{
            $sql = $sql . $arg[0];
          }
          if(isset($arg[1])){
            $sql = $sql . $arg[1];
          }
        }
        return $this->pdo->query($sql)->fetchAll();
      }

      function count(...$arg)
      {
        $sql = "SELECT count(*) FROM $this->table ";
        if(isset($arg[0])){
          if(is_array($arg[0])){
            foreach($arg[0] as $k => $v){
              $tmp[]=sprintf("`%s` = '%s'",$k,$v);
            }
            $sql = $sql . " where " . implode(" && ",$tmp);
          }else{
            $sql = $sql . $arg[0];
          }
          if(isset($arg[1])){
            $sql = $sql . $arg[1];
          }
        }
        return $this->pdo->query($sql)->fetchColumn();
      }

      function find($id)
      {
        $sql = "SELECT * FROM $this->table ";
          if(is_array($id)){
            foreach($id as $k => $v){
              $tmp[]=sprintf("`%s` = '%s'",$k,$v);
            }
            $sql = $sql . " where " . implode(" && ",$tmp);
          }else{
            $sql = $sql . " where `id` = '$id' ";
            // er1=where
          }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        //er2=fetch(PDO::FETCH_ASSOC)
      }

      function del($id)
      {
        $sql = "DELETE FROM $this->table ";
          if(is_array($id)){
            foreach($id as $k => $v){
              $tmp[]=sprintf("`%s` = '%s'",$k,$v);
            }
            $sql = $sql . " where " . implode(" && ",$tmp);
          }else{
            $sql = $sql . " where `id`='$id' ";
            //same er1 where
          }
          echo $sql;
        return $this->pdo->exec($sql);
      }

      function save($ar){
        // array
        if(isset($ar['id'])){
          foreach($ar as $k => $v){
            // er8 避免id去新增
            if($k!='id')
            $tmp[]=sprintf("`%s` = '%s'",$k,$v);
          }
          $sql = "UPDATE $this->table SET" ;
          $sql = $sql .  implode(" , ",$tmp) . " where `id`='{$ar['id']}'";
          // er3 SQLALL => $sql = "UPDATE * FROM $this->table SET implode(",",$tmp) where id"  ;
        }else{
          $sql = "INSERT INTO $this->table 
          (`".implode("`,`",array_keys($ar))."`) values
          ('".implode("','",array_values($ar))."') 
          ";
          //er7 implode第二段要改成單引號
        }
        // echo $sql;
        return $this->pdo->exec($sql);
      }
      //er4 sum()ALL & SUM(`$e`)
      function sum($e){
        $sql="SELECT SUM(`$e`) FROM $this->table";
        return $this->pdo->query($sql)->fetchColumn();
      }
    }

    
    $Total=new DB('total');
    $Account=new DB('account');
    $Note=new DB('note');
    $Vote=new DB('vote');
    $Que=new DB('que');

    //er5 if(total)整段，注意要放在$total下面
    if($Total->count(['date'=>date("Y-m-d")])<=0){
      $Total->save(['date'=>date("Y-m-d"),'total'=>0]);
    }
    if(!isset($_SESSION['total'])){
      $todayTotal=$Total->find(['date'=>date("Y-m-d")]);
      $todayTotal['total']++;
      $Total->save($todayTotal);
      $_SESSION['total']=1;
    }
  

    
    function to($url){
      header("location:$url");
    }