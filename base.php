<?php
session_start();
date_default_timezone_set('Asia/Taipei');

class DB
{
  private $dns = "mysql:host=localhost;charset=utf8;dbname=db02",
    $root = "root",
    $pw = "",
    $pdo,
    $table;

  function __construct($table)
  {
    $this->pdo = new PDO($this->dns, $this->root, $this->pw);
    $this->table = $table;
  }

  function all(...$arg)
  {
    $sql = "SELECT * FROM $this->table ";
    if (isset($arg[0])) {
      if (is_array($arg[0])) {
        foreach ($arg[0] as $k => $v)
          $tmp[] = sprintf("`%s` = '%s'", $k, $v);
        /***/
        // $tmp[]= " where " . implode(" = ",$k,$v) ;
        // $sql = $sql . $tmp ;
        $sql = $sql . " where " . implode(" && ", $tmp);
        /***/
      } else {
        $sql = $sql . $arg[0];
      }
    }
    if (isset($arg[1])) {
      $sql = $sql . $arg[1];
    }
    return $this->pdo->query($sql)->fetchAll();
  }

  function count(...$arg)
  {
    $sql = "SELECT count(*) FROM $this->table ";
    if (isset($arg[0])) {
      if (is_array($arg[0])) {
        foreach ($arg[0] as $k => $v) {
          $tmp[] = sprintf("`%s` = '%s'", $k, $v);
        }
        $sql = $sql . " where " . implode(" && ", $tmp);
        //   foreach($arg[0] as $k => $v)
        // $tmp[]= " where " . implode(" = ",$k,$v) ;
        // $sql = $sql . $tmp ;
      } else {
        $sql = $sql . $arg[0];
      }
    }
    if (isset($arg[1])) {
      $sql = $sql . $arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }

  function find($id)
  {
    $sql = "SELECT * FROM $this->table ";
    if (is_array($id)) {
      foreach ($id as $k => $v)
        $tmp[] = sprintf("`%s` = '%s'", $k, $v);
      $sql = $sql . " where " . implode(" && ", $tmp);
    } else {
      $sql = $sql . " where `id` = '$id'";
      // $sql = $sql . $id;
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  function del($id)
  {
    $sql = "DELETE FROM $this->table ";
    if (is_array($id)) {
      foreach ($id as $k => $v) {
        $tmp[] = sprintf("`%s` = '%s'", $k, $v);
      }
      $sql = $sql . " where " . implode(" && ", $tmp);
    } else {
      $sql = $sql . " where `id` = '$id'";
    }
    // echo $sql;
    return $this->pdo->exec($sql);
  }

  function save($array)
  {
    if (isset($array['id'])) {
      // if(in_array('id',$array)){
      foreach ($array as $k => $v) {
        if ($k != 'id') {
          /***/
          $tmp[] = sprintf("`%s` = '%s'", $k, $v);
        }
        // $sql = "UPDATE SET $this->table ";
        // $tmp[]= " where " . implode(" = ",$k,$v) ;
        // $sql = $sql . $tmp;
      }
      $sql = "UPDATE $this->table SET " . implode(',', $tmp) . " where `id`='{$array['id']}'";
    } else {
      $sql = "INSERT INTO $this->table 
      (`" . implode("`,`", array_keys($array)) . "`) values 
      ('" . implode("','", $array) . "')
      ";
      // . implode(" = ",$array_key[$array]) 
      // . implode("' , '",$array) 
    }

    return $this->pdo->exec($sql);
  }

  function sum($col)
  {
    /***/
    $sql = "SELECT sum(`$col`) FROM $this->table ";
    return $this->pdo->query($sql)->fetchColumn();
  }
}


$Total = new DB('total');
// $Total->new DB('total');
$User = new DB('user');
$Text = new DB('text');
$Vote = new DB('vote');
$Good = new DB('good');

if (!$Total->count(['date' => date("Y-m-d")])) {
  $Total->save(['date' => date("Y-m-d"), 'total' => 0]);
}

if (!isset($_SESSION['total'])) {
  $today = $Total->find(['date' => date("Y-m-d")]);
  $today['total']++;
  $Total->save($today);
  $_SESSION['total'] = 1;
}

function to($url)
{
  header("location:" . $url);
}
