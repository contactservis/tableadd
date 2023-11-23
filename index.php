<?
include 'class/dbase.php';
use Devtec\test\DBase ;

$db = new DBase();
$allItems = $db->getAllItems();

?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title></title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="js/script.js"></script>
</head>
<style>
    .save{
        margin: 20px 0;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="row g-3" id="formProduct">
                <div class="col-auto">
                    <label for="articul" class="">Артикул</label>
                    <input type="text" class="form-control" id="articul" name="articul">
                </div>
                <div class="col-auto">
                    <label for="nameProduct" class="">Название</label>
                    <input type="text" class="form-control" id="nameProduct" name="nameProduct">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-auto">
                    <button type="button" class="btn btn-primary save" id="saveitem" >Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Артикул</th>
                <th scope="col">Наименование</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($allItems as $item) {?>
                <tr>
                    <td><?=$item['ID']?></td>
                    <td><?=$item['ARTICUL']?></td>
                    <td><?=$item['NAME']?></td>
                    <td><span class="delete" data-id="<?=$item['ID']?>" style="color:red;cursor:pointer;">Удалить</span></td>
                </tr>
                <?}?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>