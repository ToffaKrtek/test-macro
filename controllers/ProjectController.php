<?php
include_once ROOT. '/models/Project.php';
include_once ROOT. '/models/ProjectInventory.php';

class ProjectController
{
  public function actionList()
  {
    $projects = Project::getAll();
    require_once(ROOT.'/views/index.php');
    return true;
  }
  public function actionItem(int $id)
  {
    $project = Project::getById( $id);
    $inventoryNames = array();
    $inventoryList = array(0 => array());
    $summa = array('quantity_sum' => 0, 'price_sum' => 0);
    $inventoryPre = ProjectInventory::getInventory($id);

    foreach ($inventoryPre as $key => $inventory)
    {
      if (in_array($inventory['name'], $inventoryNames))
      {
        $inventoryList[array_search($inventory['name'], $inventoryNames)]['quantity_plan'] += $inventory['quantity_plan'];
        $inventoryList[array_search($inventory['name'], $inventoryNames)]['price_plan'] += $inventory['price_plan'];
        $summa['quantity_sum'] += $inventory['quantity_plan'];
        $summa['price_sum'] += $inventory['quantity_plan'];
      }else
        {
          $inventoryList[$key] = $inventory;
          $inventoryNames += [$inventory ['name']];

          $summa['quantity_sum'] += $inventory['quantity_plan'];
          $summa['price_sum'] += $inventory['quantity_plan'];
        }
      }

    require_once(ROOT.'/views/item.php');
    return true;
  }
}
?>
