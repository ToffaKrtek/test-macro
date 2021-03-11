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
    $inventoryList = ProjectInventory::getAll();
    require_once(ROOT.'/views/item.php');
    return true;
  }
}
?>
