<?php
  class Router
  {
      //Мб, дропнуть в отдельный файл с конфигами
      public $routes =  array(
        '/item/([0-9]+)' => 'project/item/$1', //actionView в ProjectController (отчет по Id проекта)
        '/form-inventory/update/([0-9]+)' => 'form/update/$1', //Update в FormController (форма для изменения )
        '/form-inventory/add/' => 'form/add/', //Update в FormController (форма для добавления )
        '/' => 'project/list', //Главная страница (список всех элементов)
      );

        //Получение запроса
      public function getURI(): string
      {
        if (!empty($_SERVER['REQUEST_URI']))
        {
          //echo $_SERVER['REQUEST_URI'];
          return trim($_SERVER['REQUEST_URI']);
        }
      }

      public function run()
      {
        $uri = $this->getURI();
        //Ищем соответствия в массиве с путями ( как патерн -> путь к обработчику)

        foreach ($this->routes as $patern => $path)
        {
          if (preg_match("~$patern~", $uri))
          {
            //Внутренний путь
            $internalRoutes = preg_replace("~$patern~", $path, $uri);

            //Делим запрос на контроллер и экшен (как элементы массива)
            $uri_parts = explode('/', $internalRoutes);


            //Забираем первый элемент (удаляется), конкатенируем к строке, делаем перую букву заглавной
            $controllerName = ucfirst(array_shift($uri_parts).'Controller');

            //тоже самое для экшена
            $actionName = 'action' . ucfirst(array_shift($uri_parts));

            //Подключаем параметры (ID элемента, ) ---- если не добавятся параметры, то можно кидать не массивом
            $params = $uri_parts;
            //print_r($params);

        //Подключаем контроллер
            $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
            if (file_exists($controllerFile))
              {
                include_once($controllerFile);
              }

            //Object
            $controllerObject = new $controllerName;

            //$result = $controllerObject->$actionName();
            //Чтобы получать не массив..
            $result = call_user_func_array(array($controllerObject, $actionName), $params);
            if ($result != null)
            {
              break;
            }
          }
        }

      }
  }
