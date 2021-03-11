<?php
  abstract class Main
{
  public static $table_name = ''; //Ия таблицы, к которой обращаемся. Определяется в классах наследниках

  public static function getById (int $id)
  {
    if($id)
    {
      $db = DB::getConnect();
      $table_name = static::$table_name;
      $sql = "SELECT * FROM $table_name WHERE id=".$id;
      $result = $db->query($sql);
      return $result->fetch();
    }else {
      return "No ID!";
    }
  }
  
  public static function getAll()
  {
    $db = DB::getConnect();
    $table_name = static::$table_name;
    $sql = "SELECT * FROM $table_name";
    $result = $db->query($sql);
    return $result->fetchAll();
  }
}

 ?>
