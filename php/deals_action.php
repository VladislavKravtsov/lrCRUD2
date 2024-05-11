<?php 
class DealsAction {

public static function get_deals() : array { 

$table = array();

$sql = DealsLogic::get_sql_deals($_GET); 
if(!empty($sql[1])) {
	$result = DealsTable::get_table_deals($sql[1], $sql[0]);
}else {
	$result = DealsTable::get_table_deals($sql[0], null);
}

 while ($row = $result->fetch(PDO::FETCH_BOTH)) {
            $table[] = $row;
}
return $table; 




}


public static function AddDeal() {
   $image = array_shift($_FILES);
   
   $errors = CollectorsLogic::check_deal($_POST, $image);
   if(!empty($errors)) {
   	return $errors;
   }
   $link = download_image($image);
   DealsTable::deal_in_table($_POST, $link, "INSERT INTO deals(img_path, adress, description, customer, cost) VALUES(:img_path, :adress, :description, :customer, :cost)");
   header("Location: table.php");
   
}

public static function DeleteDeal() {
   if(isset($_POST['delete'])) {
      if(isset($_POST['id'])) {
   $id = $_POST['id'];

   }

   
   CollectorsTable::delete_deal($id, $image);
   header("Location: table.php");
   } 
}

public static function UpdateDeal() {
   
   if(isset($_POST['edit_redirect'])) {
      if(isset($_POST['id'])) {
         $id = $_POST['id'];
      }
      $deal = DealsTable::getRecord("deals", $id);
  
   $_SESSION['deal'] = $deal;
   header("Location: edit.php");
   }
   if(isset($_POST['edit'])) {

   $image = array_shift($_FILES);
   $link = download_image($image);
   
    $errors = DealsLogic::check_deal($_POST, $image);
   if(!empty($errors)) {
      return $errors;
   }
   
   DealsTable::deal_in_table($_POST, $link, "UPDATE deals SET img_path=:img_path, adress=:adress, description=:description, customer=:customer, cost=:cost WHERE id = :id;");
   session_unset(); 
   header("Location: table.php");
   }
   
}
public static function DeleteDealsByCustomer($id) {
   $table = array();
   $dealsInCustomers = DealsTable::get_table_deals("SELECT *,deals.id FROM deals WHERE deals.customer = " . $id, null);
   while ($row = $dealsInCustomers->fetch(PDO::FETCH_BOTH)) {
            $table[] = $row;
}
   foreach($item as $table) {
      DealsTable::delete_deal($item['id'], $item['link']);
   }
}
}