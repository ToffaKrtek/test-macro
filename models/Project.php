<?php
include_once ROOT . '/models/Main.php';
// include_once ROOT . '/models/ProjectInventory.php';

  class Project extends Main
  {
    public static $table_name = 'projects'; //Имя таблицы, для использовани в родительском методе
    
    protected function add(Project $item)
    {

    }
    protected function update(int $id)
    {

    }
  }

 ?>
