<?php
  class DB
  {
    public static function getConnect()
    {
      $paramsPath = ROOT. '/keys.php';
      $params = include($paramsPath);
      $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
      $db = new PDO($dsn, $params['user'], $params['password'],[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      return $db;
    }
  }
 ?>
