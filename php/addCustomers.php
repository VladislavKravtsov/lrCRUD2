<?php require_once 'core.php'; $customers = CustomersAction::get_customers(); if($_POST){$messages=  array(); $messages = CustomersAction::AddCustomers(); } ?>
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
                   
                    <th scope="col">Заказчик</th>
                
                </tr>
         </thead>
<tbody>
                
	 <tr>
                	
                    <th scope="col"><input name = "cname" type="text" value="<?php if(isset($_POST) && count($_POST) > 0) {  print($_POST['cname']); }?>"  class="form-control" ></th>
                   
                   
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