<?php 
class DealsLogic {



public static function get_sql_deals(array $get) :array {

$sql = "SELECT *,deals.id FROM deals INNER JOIN customers ON deals.customer = customers.id";
$arBinds = [];
$conditions = array();
$return = array();
if(!key_exists('clearFilter', $get)){
if(count($get) > 0) {
	
 
	if($get['costFrom']) {
        
      
      $conditions[] = "deals.cost > :costFrom";

      $arBinds['costFrom'] = $get['costFrom'];
	 
	   
	}
    
	if($get['costTo']) {
		
		 $conditions[] = "deals.cost < :costTo";
		  $arBinds['costTo'] = $get['costTo'];
   
	}
	
	if($get['customer']) {
		 $conditions[] = "deals.customer = :customer";
		$arBinds['customer'] = $get['customer'];
		
	}
     if($get['adress']) {
      $conditions[] = "deals.adress LIKE :adress"; 
      $arBinds['adress'] ='%'. $get['adress']. '%';
     }
     if($get['description']) {
      $conditions[] = "deals.description LIKE :description"; 
      $arBinds['description'] ='%'. $get['description']. '%';
     }



$return[] = $arBinds;

   
	$sql .=" WHERE " . implode(' AND ' , $conditions);
	

} 
	
}else {
	$_GET['adress'] = null;
	$_GET['customer'] = null;
	$_GET['costFrom'] = null;
	$_GET['costTo'] = null;
	$_GET['description'] = null;
}

$return[] = $sql;
return $return; 
	


}


public static function check_deal(array $data, $image) {
	$types_image = [
     'image/jpeg',
     'image/png'

	];
	$sign_errors = array();
  
	if (!isset($image['name'])) {
		$sign_errors[] = error_msg("Вы не поставили фотографию сборщика!");
		
	}else {
		if(!in_array($image['type'], $types_image)) {
        $sign_errors[] = error_msg("Неправильный формат изображения! Допускаются только png и jpeg.");
	}

	}

	if(empty(str_replace(" ", "", $data['adress']))){
		$sign_errors[] = error_msg("Вы не ввели ФИО сборщика!");

	}

	if(empty($data['cost'])) {
		$sign_errors[] = error_msg("Вы не ввели дату рождения!");
	}
	if(empty($data['customer'])) {
        $sign_errors[] = error_msg("Вы не выбрали бригаду!");
	}
	

	
	return $sign_errors;
}






}