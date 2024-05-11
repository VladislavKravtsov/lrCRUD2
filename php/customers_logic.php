<?php
class CustomersLogic {
	public static function get_sql_customers() {
	$brigadsql = "SELECT customers.id, customers.cname FROM customers";
	return $brigadsql;
}

public static function check_customer($data) {

}
}
