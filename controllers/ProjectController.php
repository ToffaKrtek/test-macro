<?php
include_once ROOT. '/models/Project.php';
include_once ROOT. '/models/ProjectInventory.php';

class ProjectController
{
  public function actionList()
  {
    $projects = Project::getAll('projects');
    require_once(ROOT.'/views/index.php');
    return true;
  }
  public function actionItem(int $id)
  {
    $project = Project::getById('projects', $id);
    $inventoryList = ProjectInventory::getById();
    require_once(ROOT.'/views/item.php');
    return true;
  }
}
?>
