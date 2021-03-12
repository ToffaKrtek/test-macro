<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title><?=$project['name']?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">
    <h5><a href="/">Main</a></h5><h1><?=$project['name']?></h1>
   <table class="table t table-hover">
   <thead>
     <tr>
       <th>Наименование номенклатуры</th>
       <th>Плановый объем</th>
       <th>Плановая Цена</th>
     </tr>
   </thead>
   <tbody>
     <?php foreach ($inventoryList as $item): ?>
       <!-- Ссылку на изменение пришлось делать по индексу ID, а не по ключу, так как баговалось значение -->
     <tr onClick="window.location.href='/form-inventory/update/<?=$item[0]?>';">
       <td><?=$item['name']?></td>
       <td><?=$item['quantity_plan']?></td>
       <td><?=$item['price_plan']?></td>
     </tr>
   <?php endforeach; ?>
   <tr>
   <th>Итого</th>
   <th><?=$summa['quantity_sum']?></th>
   <th><?=$summa['price_sum']?></th>
   </tr>
   </tbody>
 </table>
 <button type="button" class="btn  btn-outline-success" onClick="window.location.href='/form-inventory/add/<?=$project['id']?>';">+</button>
 </div>
</body>
</html>
