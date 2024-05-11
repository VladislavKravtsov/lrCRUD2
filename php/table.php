<?php require_once 'core.php';  $table = DealsAction::get_deals(); $customerstable = CustomersAction::get_customers();if($_POST){ DealsAction::DeleteDeal(); DealsAction::UpdateDeal();}    ?>
<!DOCTYPE html> 
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<?php require_once 'header.php'?>
	<div class="container text-center">
        <form action="table.php" method="get">
            <label>Фильтрация результата поиска</label>
            <div class="mb-3">
                <label>По цене:</label>
                <input type="data" name="costFrom" placeholder="Цена от" <?php if(isset($_GET['customers'])) { ?> value='<?=  $_GET['costFrom'] ?>' <?php } ?> class="form-control">
                <input type="data" name="costTo" placeholder="Цена до" <?php if(isset($_GET['customers'])) { ?> value='<?=  $_GET['costTo'] ?>' <?php } ?> class="form-control mt-3">
            </div>
            <div class="mb-3">
                <label>Фильтрация по бригаде:</label>
                <select name="customer" class="form-control">

                    <option value="" selected="">Выберите заказчика</option>
                    <?php foreach ($customerstable as $customer) {    ?>
                                            
                   <option value="<?= $customer['id']; ?>" <?php if(isset($_GET['customers']) && $_GET['customers'] == $customer['cname']) { ?> selected="selected"  <?php } ?>> <?= $customer['cname']; ?></option> 
                     <?php  } ?>
                                            
                </select>
            </div>
            <div class="mb-3">
                <label>Фильтрация по описанию:</label>
                <textarea class="form-control" placeholder="Введите описание сборщика" value="" name="description"><?php if(isset($_GET['description']))  echo htmlspecialchars($_GET['description'])  ?></textarea>
            </div>
            <div class="mb-3">
                <label>Фильтрация по адресу:</label>
                <input type="text" name="adress" placeholder="Введите адрес" value="<?php if(isset($_GET['adress']))  echo htmlspecialchars($_GET['adress'])  ?>" class="form-control">
            </div>
            <input type="submit" value="Применить фильтр" class="btn btn-primary">
            <input type="submit" name="clearFilter" value="Очистить фильтр" class="btn btn-danger">
        </form>
    </div>
	<table class="table">
                <thead>
                <tr>
                    <th scope="col">Скан накладной</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Заказчик</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                </tr>
                </thead>
   <tbody>

<?php 



if(count($table) > 0) {

foreach ($table as $row) {

  ?>
 
   <tr>

      <th scope="row"><img src="../img/<?= $row['img_path']?>" style="max-width: 200px; height: 120px;"></th>
      <td> <?= $row['adress']; ?> </td>
      <td> <?= $row['cname'] ?></td>
      <td>
      	<?php 
           if(isset($row['description'])) {
           	print($row['description']);
           }else {
           		print('Отсутствует.');
           }

      	?>

      </td>
      <td><?= $row['cost'] ?> </td>
      <td>
        <br>
        <form action="" method="post"><input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         <button name="edit_redirect" class="btn btn-primary ">Редактировать</button>
         <br>
        <button name="delete" class="btn btn-danger mt-2">Удалить</button>
      </form></td>
    
  </tr>
    <?php
}
} else { ?>

<tr scope="row"><th colspan="5"><h1>не найдены.</h1></th></tr>
	<?php
}



?>
</tbody>
            </table>
             <a class="btn btn-success" href="add.php">Добавить</a>
		<?php require_once 'footer.php'?>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>