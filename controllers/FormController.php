<?php
include_once ROOT. 'models/Project.php';

class FormController
{
  public function actionIndex()
  {
    require_once(ROOT.'/views/form.php');
    return true;
  }
}

 ?>
