<?php
  //  Для использования Отключить в .htaccess  редирект! (или написать исключение)
  //CREATE DATABASE test DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
  $host = 'localhost';
  $dbname = 'test';
  $user = 'test';
  $password = 'password';
  //В одну строку запрос не влез (возможно из-за личных конфигов PHP - долго разбираться я не стал, - раз ругается, то сразу сделал массивом + цикл)
    $sql = array(
      "projects" => "CREATE TABLE IF NOT EXISTS projects( ".
                "id INT(11) AUTO_INCREMENT, ".
                "name VARCHAR(255) NOT NULL, ".
                "PRIMARY KEY ( id )); ",
      "inventory_noms" => "CREATE TABLE IF NOT EXISTS inventory_noms( ".
                "id INT(11) AUTO_INCREMENT, ".
                "name VARCHAR(255) NOT NULL, ".
                "price DECIMAL(10, 2) NOT NULL, ".
                "type ENUM('inventory','service','work','machine'), ".
                "PRIMARY KEY ( id )); ",
      "projects_inventory" => "CREATE TABLE IF NOT EXISTS projects_inventory( ".
                "id INT(11) AUTO_INCREMENT, ".
                "projects_id INT(11) NOT NULL, ".
                "noms_id INT(11) NOT NULL, ".
                "quantity_plan DECIMAL(16, 4) NOT NULL, ".
                "price_plan DECIMAL(10, 2) NOT NULL, ".
                "PRIMARY KEY ( id )); "
    );
    //Делаем все таблички разом
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    foreach ($sql as $table => $command) {
      try {
        $db->exec($command);
        echo "Таблица $table создана <br>";
      } catch(PDOException $e)
        {
          echo $e->getMessage();//Remove or change message in production code
        }
    }
 ?>
