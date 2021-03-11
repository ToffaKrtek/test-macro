<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">
      <h5><a href="/">Main</a></h5><h1>Добавить</h1>

    <form action="#" method="post">
      <div class="form-group">
        <small class="form-text text-muted">Наименование номенклатуры</small>
       <input type="text" class="form-control"  id="name"  name="name"  placeholder="Наименование номенклатуры" value="<?=$name?>">
     </div>
       <br>
       <!-- Данное поле отображается только если номенклатура новая - не найдена в БД -->
     <?php if($new_nom): ?>
         <div class="form-group">
           <label for="type_nom"  class="form-text text-muted">Выберите тип для новой Номенклатуры</label>
           <select class="form-control" id="type_nom" name="type_nom">
             <?php  foreach ($types_nom as $type_nom):?>
               <option value="<?=$type_nom;?>">"<?=$type_nom;?></option>
             <?php endforeach; ?>
           </select>
        </div>
          <br>
      <?php endif; ?>

    <div class="form-group">
       <small  class="form-text text-muted">Введите количество</small>
     <input type="number" class="form-control" id="quantity_plan" name="quantity_plan" placeholder="Количество" step="0.0001" value="<?=$quantity_plan?>">
    </div>
  <br>
    <div class="form-group">
       <small  class="form-text text-muted">Введите цену</small>
     <input type="number" class="form-control" id="price_plan" name="price_plan" placeholder="Цена" step="0.01" value="<?=$price_plan?>">
    </div>
  <br>
    <div class="form-group">
        <label for="project_id"  class="form-text text-muted">Выберите проект</label>
        <select class="form-control" id="project_id" name="project_id">
          <?php  foreach ($projects as $project):?>
          <option
            <?php if($project['id'] == $project_id): ?>
              selected="selected"
            <?php endif; ?>
            value="<?=$project['id'];?>"><?=$project['name'];?></option>
        <?php endforeach; ?>
        </select>
      </div>
  <br>
    <div class="form-group">
     <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
     </div>
  </form>
  </div>
</body>
</html>
