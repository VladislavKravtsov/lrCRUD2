<?php
class CustomersTable extends  crudTable {
	public static function get_customers(string $sql) {
	$db = Database::getInstance();
	$stmt = $db->query($sql);  
	return($stmt);
}
public static function customer_in_table($data,  $sql) {
$db = Database::getInstance();
$stmt = $db->prepare($sql);
$stmt->bindParam(':cname', $data['cname']);
if(isset($data['id'])) {
	$stmt->bindParam(':id', $data['id']);
}
$stmt->execute();
}
public static function delete_customer($id) {
$db = Database::getInstance();
    $sql = "SELECT * FROM customers WHERE id = :id; DELETE FROM customers WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

}
/*
public static function get_brigada($id) {
 $db = Database::getInstance();
  $sql = "SELECT * FROM brigads WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row;
}
*/
}
