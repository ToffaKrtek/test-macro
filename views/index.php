<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title></title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <table>
    <tbody>
     <?php foreach ($projects as $project):?>
       <tr><td><?=$project['id']?></td><td><?=$project['name']?></td></tr>
    <?php endforeach; ?>
  </tbody>
 </table>

</body>
</html>
