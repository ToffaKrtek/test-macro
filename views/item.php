<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title><?=$project['name']?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <h5><a href="/">Main</a></h5><h1><?=$project['name']?></h1>
  <span> <a href="/project/update/<?=$project['id']?>">UPT</a> <a href="/project/delete/<?=$project['id']?>">DEL</a></span>
   <table class="table t table-hover">
   <thead>
     <tr>
       <th>Наименование номенклатуры</th>
       <th>Плановый объем</th>
       <th>Плановая стоимость</th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     <?php foreach ($inventoryList as $item): ?>
     <tr onClick="window.location.href='item/<?=$person['person_id']?>';">
       <td><?=$item['name']?></td>
       <td><?=$item['quantity_plan']?></td>
       <td><?=$item['price_plan']?></td>
       <td>
         <a>UPT</a>
         <a>DEL</a></td>
     </tr>
   <?php endforeach; ?>
   </tbody>
 </table>
 </div>
</body>
</html>
