<?php
include_once ROOT. '/models/ProjectInventory.php';
include_once ROOT. '/models/InventoryNoms.php';
include_once ROOT. '/models/Project.php';

class FormController
{
  public function actionAdd($project_id = 1)
  {
    //Большинство свойств подставляются в тело странцы
    $name = !empty($_COOKIE['name']) ? $_COOKIE['name'] : '';

    // Список возможных значений типа номенклатуры - отображается только при создании новой
    $types_nom = ['inventory','service','work','machine'];
    $type_nom = !empty($_COOKIE['type_nom']) ? $_COOKIE['type_nom'] : '';
    $quantity_plan = !empty($_COOKIE['quantity_plan']) ? $_COOKIE['quantity_plan'] : 0.0;
    $price_plan = !empty($_COOKIE['price_plan']) ? $_COOKIE['price_plan'] : 0.0;
    $nom_id = 0;
    $project_id = 0;

    //Определяем новая ли номенклатура -> При сабмите ищем в БД, если нету, то ставим флаг в куках, выводим варианты выбора типа
    $new_nom = !empty($_COOKIE['new_nom']) ? true : false;

    // Обращаемся к таблице с Проектами, для динамического вывода в селекте
    $projects = Project::getAll();

    //Проверяем супермассив Пост
    if (isset($_POST['submit']))
     {
         //Проверяем есть ли флаг о том, что номенклатура новая
       if($new_nom == false)
       {
         //Ищем соответствия в таблице Номенклатуры по указанному имени
         $nom_id = InventoryNoms::searchName($_POST['name']);

       // Если Номенклатура новая, то необходимо указать её тип - раз уж кнопка Сабмита нажата, то решил сохранять в куках все записанное в форме, + добавлять селект с выбором типа Номенклатуры
         if ($nom_id === false)
         {
           //Решил сохранять данные + выводить доп поле в форму, если Номенклатура новая, посредством куки, созданных на секунду - решение явно спорное
           setcookie("new_nom", true, time()+100);
           setcookie("name", $_POST['name'], time()+100);
           setcookie("quantity_plan", $_POST['quantity_plan'], time()+100);
           setcookie("price_plan", $_POST['price_plan'], time()+100);
           header('Location: #');
           die();
         }
       }else {
         //Вот тут можно сделать лучше -- сразу из метода возвращать ID, вместо 2 обращений к базе, но пока пусть будет так
         //Создаем номенклатуру и записываем её ID
         InventoryNoms::add($_POST['name'], $_POST['price_plan'], $_POST['type_nom']);
         $nom_id = InventoryNoms::searchName($_POST['name']);
       }
       //Формируем запрос
       $name = $_POST['name'];
       $quantity_plan = $_POST['quantity_plan'];
       $price_plan = $_POST['price_plan'];
       $project_id = $_POST['project_id'];

       //Создаем объект в БД
       $result = ProjectInventory::add($nom_id, $project_id, $name, $quantity_plan, $price_plan);

       //Удаляем куки, чтобы не было автозаполнения.. редиректим в раздел проекта, в который добавили номенклатуру
       unset ($_COOKIE);
       header('Location: /item/'.$project_id);
       die();
     }
    require_once(ROOT.'/views/form.php');
    return true;
  }

  public function actionUpdate()
  {
    require_once(ROOT.'/views/form.php');
    return true;
  }
  
  public function actionDelete()
  {
    require_once(ROOT.'/views/form.php');
    return true;
  }
}

 ?>
