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
    $inventoryId = array();
    $inventoryList = array(0 => array());
    $summa = array('quantity_sum' => 0, 'price_sum' => 0);
    $inventoryPre = ProjectInventory::getInventory($id);

    foreach ($inventoryPre as $key => $inventory)
    {
      if (in_array($inventory['noms_id'], $inventoryId))
      {
        $inventoryList[array_search($inventory['noms_id'], $inventoryId)]['quantity_plan'] += $inventory['quantity_plan'];
        $inventoryList[array_search($inventory['noms_id'], $inventoryId)]['price_plan'] += $inventory['price_plan'];
        $summa['quantity_sum'] += $inventory['quantity_plan'];
        $summa['price_sum'] += $inventory['price_plan'];
      }else
        {
          $inventoryList[$key] = $inventory;
          $inventoryId += [$key => $inventory ['noms_id']];

          $summa['quantity_sum'] += $inventory['quantity_plan'];
          $summa['price_sum'] += $inventory['price_plan'];
        }
      }

    require_once(ROOT.'/views/item.php');
    return true;
  }
}
?>
