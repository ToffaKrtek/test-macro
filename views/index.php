<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>Список проектов</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <h1>Список проектов</h1>
    <table  class="table t table-hover">
      <thead>
       <tr>
         <th>ID</th>
         <th>Название проекта</th>
       </tr>
     </thead>
      <tbody>
       <?php foreach ($projects as $project):?>
         <tr onClick="window.location.href='item/<?=$project['id']?>';">
           <td><?=$project['id']?></td>
           <td><?=$project['name']?></td>
         </tr>
      <?php endforeach; ?>
    </tbody>
   </table>
 </div>
</body>
</html>
