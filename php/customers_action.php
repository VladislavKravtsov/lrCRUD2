<?php
class CustomersAction {
	public static function get_customers() : array {
	$sql = CustomersLogic::get_sql_customers();
	$result = CustomersTable::get_customers($sql);
	 while ($row = $result->fetch(PDO::FETCH_BOTH)) {
            $customerstable[] = $row;


}
return $customerstable;
}

public static function AddCustomers() {

   
   $errors = CustomersLogic::check_customer($_POST);
   if(!empty($errors)) {
   	return $errors;
   }
  
   CustomersTable::customer_in_table($_POST, "INSERT INTO customers(cname) VALUES(:cname)");
   header("Location: tableCustomers.php");
}
public static function DeleteCustomers() {
if(isset($_POST['delete'])) {
      if(isset($_POST['id'])) {
   $id = $_POST['id'];

   }

   DealsAction::DeleteDealsByCustomer($id);
   
   CustomersTable::delete_customer($id);
   header("Location: tableCustomers.php");
   } 
}

public static function UpdateCustomers() {
 if(isset($_POST['edit_redirect'])) {
      if(isset($_POST['id'])) {
         $id = $_POST['id'];
      }
      $customer = CustomersTable::getRecord("customers", $id);
  
   $_SESSION['customer'] = $customer;
   header("Location: editCustomers.php");
   }
   if(isset($_POST['edit'])) {


   
    $errors = CustomersLogic::check_customer($_POST);
   if(!empty($errors)) {
      return $errors;
   }
   
   CustomersTable::customer_in_table($_POST,"UPDATE customers SET  cname=:cname WHERE id = :id;");
   session_unset(); 
   header("Location: tableCustomers.php");
   }
}


}
