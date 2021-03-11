<?php
  abstract class Main
{
  public static function getById (string $table_name, int $id)
  {
    if($id)
    {
      $db = DB::getConnect();
      $sql = "SELECT * FROM $table_name WHERE id=".$id;
      $result = $db->query($sql);
      return $result->fetch();
    }else {
      return "No ID!";
    }
  }
  public static function getAll(string $table_name)
  {
    $db = DB::getConnect();
    $sql = "SELECT * FROM $table_name";
    $result = $db->query($sql);
    return $result->fetchAll();
  }
}

 ?>
