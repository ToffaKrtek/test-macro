<?php
include_once ROOT. '/models/InventoryNoms.php';
include_once ROOT . '/models/Main.php';

class ProjectInventory extends Main
{
  public static $table_name = 'projects_inventory'; //Имя таблицы, для использовани в родительском методе

  public static function getInventory(int $project_id)
  {
    if($project_id)
    {
      $db = DB::getConnect();
      $sql = "SELECT * FROM projects_inventory INNER JOIN inventory_noms ON projects_inventory.noms_id = inventory_noms.id  WHERE projects_id=".$project_id;
      $result = $db->query($sql);
      return $result->fetchAll();
      //Первый вариант - очевидно глупый (много обращений к БД, отказался сразу после написания -- оставил в виде коммента только из-за честности (раз уж задание тестовое))
      // $list_inventory = $result->fetchAll();
      // foreach ($list_inventory  as $key => $inventory) {
      //   $noms_id = $inventory['noms_id'];
      //   $inventory_nom = InventoryNoms::getById($noms_id);
      //   // array_push($inventory ['name' =>  $inventory_nom['name'], 'type' => $inventory_nom['type']]);
      //   $list_inventory[$key] += $inventory_nom;
      //
      // // }
      // return $list_inventory;
    }else {
      return "No ID!";
    }
  }
  public static function add(int $nom_id, int $project_id, float $quantity_plan, float $price_plan)
  {
    $db = DB::getConnect();
    $sql = 'INSERT INTO projects_inventory (projects_id, noms_id, quantity_plan, price_plan) VALUES (:project_id, :nom_id, :quantity_plan, :price_plan)';
    $result =   $db->prepare($sql);
    $result->bindParam(':project_id', $project_id, PDO::PARAM_INT);
    $result->bindParam(':nom_id', $nom_id, PDO::PARAM_INT);
    $result->bindParam(':quantity_plan', $quantity_plan, PDO::PARAM_STR);
    $result->bindParam(':price_plan', $price_plan, PDO::PARAM_STR);
    return $result->execute();
  }

  public static function update(int $id, int $projects_id, int $noms_id, float $quantity_plan, float $price_plan)
  {
    $db = DB::getConnect();
    $sql = 'UPDATE projects_inventory SET projects_id=?, noms_id=?, quantity_plan=?, price_plan=? WHERE id=?';
    $result =   $db->prepare($sql);

    return $result->execute([$projects_id, $noms_id, $quantity_plan, $price_plan, $id]);
  }

}
 ?>
