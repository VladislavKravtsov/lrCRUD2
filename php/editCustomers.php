<?php require_once 'core.php';  $customers = CustomersAction::get_customers(); $messages=  array(); $customers = $_SESSION['customer']; $messages =  CustomersAction::UpdateCustomers(); ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование бригады</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css">
	
</head>
<body>
		<form enctype="multipart/form-data" action="" method="post"class="form-control">
			<input name="id"type="hidden" value="<?= $customers['id']; ?>">
	<table class="table">
		
       <thead>
			 <tr >
                   
                    <th scope="col">Заказчик</th>
                  
                </tr>
         </thead>
<tbody>
                
	 <tr>
                
                    <th scope="col"><input name = "cname" type="text" value="<?php  print($customers['cname']); ?>"  class="form-control" ></th>
                   
                
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