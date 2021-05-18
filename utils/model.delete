<?php
namespace Utils;

class Model extends \Prefab {
    
	public function __construct() {
		$f3 = \Base::instance();	
		$this->db = $f3->get('db');
	}

	public static function tablecast(string $table, array $qry = []){
		$f3 = \Base::instance();	
		$obj = new \DB\SQL\Mapper($f3->get('db'),$table);			
		$f3->set($table,$obj->load()->cast());
	}
	  
}