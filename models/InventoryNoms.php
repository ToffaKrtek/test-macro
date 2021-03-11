<?php
include_once ROOT . '/models/Main.php';

class InventoryNoms extends Main
{
  public static $table_name = 'inventory_noms';


  public static function searchName(string $name_nom, string $type_nom = '')
  {
    $db = DB::getConnect();
    $search_name = $name_nom .'%';
    $result = $db->prepare("SELECT * FROM inventory_noms WHERE `name` LIKE :name_nom");
    $result->bindParam(":name_nom", $search_name);
    $result->execute();
    $nom = $result->fetch(PDO::FETCH_ASSOC);
    if ($nom)
    {
      return $nom['id'];
    }else {
      return false;
    }

  }
  public static function add(string $name_nom, float $price, string $type)
  {
    $db = DB::getConnect();
    $sql = 'INSERT INTO inventory_noms (name, price, type) VALUES (:name_nom, :price, :type)';
    $result = $db->prepare($sql);
    $result->bindParam(':name_nom', $name_nom, PDO::PARAM_STR);
    $result->bindParam(':price', $price, PDO::PARAM_STR);
    $result->bindParam(':type', $type, PDO::PARAM_STR);
    $result->execute();

    return true;
  }
  public static function update(int $id, string $name_nom, float $price, string $type)
  {
    $db = DB::getConnect();
    $sql = 'UPDATE inventory_noms SET name=?, price=?, type=? WHERE id=?';
    $result =   $db->prepare($sql);

    return $result->execute([$name_nom, $price, $type, $id]);
  }
}
 ?>
