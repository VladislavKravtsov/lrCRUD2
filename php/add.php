<?php require_once 'core.php'; $customers = CustomersAction::get_customers(); if($_POST){$messages=  array(); $messages = DealsAction::AddDeal(); } ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Добавление нового сборщика</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css">
	
</head>
<body>
		<form enctype="multipart/form-data" action="" method="post"class="form-control">
	<table class="table">
		
       <thead>
			 <tr >
                    <th scope="col" >Изображение</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Бригада</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Дата</th>
                </tr>
         </thead>
<tbody>
                
	 <tr>
                	<th scope="col" ><input name="image" type="file"class="form-control" /></th>
                    <th scope="col"><input name = "adress" type="text" value="<?php if(isset($_POST) && count($_POST) > 0) {  print($_POST['adress']); }?>"  class="form-control" ></th>
                    <th scope="col"> <select name="customer" class="form-control">

                    <option value="" selected="">Выберите производителя</option>
                    <?php foreach ($customers as $customer) {    ?>
                                            
                   <option value="<?= $customer['id']; ?>"> <?= $customer['cname']; ?></option> 
                     <?php  } ?>
                                            
                </select></th>
                    <th scope="col"><input name="description" type="text"  value="<?php if(isset($_POST) && count($_POST) > 0) {  print($_POST['description']); } ?>"  class="form-control" ></th>
                    <th scope="col"><input name="cost" type="date" value="<?php if(isset($_POST) && count($_POST) > 0) {  print($_POST['cost']); }?>"  class="form-control" ></th>
                </tr>
           

</tbody>
               
		

		
		

	</table>
	<input type="submit" value="Добавить" class="btn btn-success">
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