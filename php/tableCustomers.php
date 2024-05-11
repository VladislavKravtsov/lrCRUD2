<?php require_once 'core.php';  $customerstable = CustomersAction::get_customers();if($_POST){ CustomersAction::DeleteCustomers(); CustomersAction::UpdateCustomers();}    ?>
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
	
	<table class="table">
                <thead>
                <tr>
                    
                    <th scope="col">Заказчик</th>
                  
                </tr>
                </thead>
   <tbody>

<?php 



if(count($customerstable) > 0) {

foreach ($customerstable as $row) {

  ?>
 
   <tr>

    
      <td> <?= $row['cname'] ?></td>
    
     
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

<tr scope="row"><th colspan="5"><h1>Заказчики не найдены.</h1></th></tr>
	<?php
}



?>
</tbody>
            </table>
             <a class="btn btn-success" href="addCustomers.php">Добавить</a>
		<?php require_once 'footer.php'?>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>