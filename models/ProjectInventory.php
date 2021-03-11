<?php
include_once ROOT. '/models/InventoryNoms.php';

class ProjectInventory extends Main
{
  public static $table_name = 'projects_inventory'; //Имя таблицы, для использовани в родительском методе

  public static function getInventory(int $project_id)
  {
    if($project_id)
    {
      $db = DB::getConnect();
      $sql = "SELECT * FROM projects_inventory WHERE projects_id=".$project_id;
      $result = $db->query($sql);
      $list_inventory = $result->fetchAll();
      foreach ($list_inventory  as $key => $inventory) {
        $noms_id = $inventory['noms_id'];
        $inventory_nom = InventoryNoms::getById($noms_id);
        // array_push($inventory ['name' =>  $inventory_nom['name'], 'type' => $inventory_nom['type']]);
        $list_inventory[$key] += $inventory_nom;

      }
      return $list_inventory;
    }else {
      return "No ID!";
    }
  }
  protected function add(Project $item)
  {

  }
  protected function update(int $id)
  {

  }
}
 ?>
