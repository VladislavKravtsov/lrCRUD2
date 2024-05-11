<?php 

class DealsTable extends crudTable {

public static function get_table_deals(string $sql, $arBinds) {
  $db = Database::getInstance();
  $stmt = $db->prepare($sql);
  $stmt->execute($arBinds);
  return $stmt;

}

public static function deal_in_table($data, $link, $sql){

$db = Database::getInstance();
$stmt = $db->prepare($sql);
$stmt->bindParam(':img_path', $link);
$stmt->bindParam(':adress', $data['adress']);
$stmt->bindParam(':description', $data['description']);

$stmt->bindParam(':customer', $data['customer']);
$stmt->bindParam(':cost', $data['cost']);
if(isset($data['id'])){
  $stmt->bindParam(':id', $data['id']);
}
$stmt->execute();


}


public static function delete_deal($id, $link) {
	$db = Database::getInstance();
    $sql = "SELECT * FROM deals WHERE id = :id; DELETE FROM deals WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    unlink($row['img_path']);
    
}

}