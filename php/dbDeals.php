<?php 
class Database {

      protected static $_instance;
      private $pdo;
        private function __construct() {    
        
	   $this->pdo = new \PDO('mysql:host=localhost;dbname=wood_family', 'root', '');
    }

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;  
        }
 
        return self::$_instance;
    }
    public function prepare(string $sql)  {
    	$stmt = $this->pdo->prepare($sql);
    	return $stmt;
    }
   public function query(string $sql) {
   	$stmt = $this->pdo->query($sql);
   	return $stmt;
   }
    private function __clone() {
    }

    private function __wakeup() {
    }    

}