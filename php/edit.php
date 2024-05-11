<?php require_once 'core.php';  $customers = CustomersAction::get_customers(); $messages=  array(); $deal = $_SESSION['deal']; $messages =  DealsAction::UpdateDeal(); ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование продукта</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css">
	
</head>
<body>
		<form enctype="multipart/form-data" action="" method="post"class="form-control">
			<input name="id"type="hidden" value="<?= $deal['id']; ?>">
	<table class="table">
		
       <thead>
			 <tr >
                    <th scope="col">Скан накладной</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Заказчик</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                </tr>
         </thead>
<tbody>
                
	 <tr>
                	<th scope="col" ><input name="image" type="file"class="form-control" value="<?= $deal['img_path']; ?>" /></th>
                    <th scope="col"><input name = "adress" type="text" value="<?php  print($deal['adress']); ?>"  class="form-control" ></th>
                    <th scope="col"> <select name="customer" class="form-control">

                    <option value="">Выберите производителя</option>
                    <?php foreach ($customers as $customer) {    ?>
                                            
                   <option value="<?= $customer['id']; ?>" <?php if($deal['customer'] == $customer['id'] ) { ?> selected  <?php } ?>> <?= $customer['cname']; ?></option> 
                     <?php  } ?>
                                            
                </select></th>
                    <th scope="col"><input name="description" type="text"  value="<?php   print($deal['description']); ?>"  class="form-control" ></th>
                    <th scope="col"><input name="cost" type="cost" value="<?php  print($deal['cost']); ?>"  class="form-control" ></th>
                </tr>
           

</tbody>
               
		

		
		

	</table>
	<input name="edit" type="submit" value="Редактировать" class="btn btn-primary">
                </form>
                <div>
                	<?php 

                   if(isset($messages)) {
               	foreach ($messages as $message) {
               		print($message);
               	}
               }
                	?>
                </div>
               
</body>
</html>