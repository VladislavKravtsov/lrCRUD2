<?php 
abstract class crudTable {
	public static function deleteRecord() {

	}
	public static function getRecord($table, $id) {
		$db = Database::getInstance();
  $sql = "SELECT * FROM " . $table . " WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row;
	}
}