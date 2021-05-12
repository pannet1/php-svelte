<?php
namespace controller;

final class Master extends Main {	

	public function beforeroute(\Base $f3, array $args = []){				
		$this->mapper = new \model\Query($f3->get('db'), 'master');		
	}	
	
	// get module all  	
	public function get_all(\Base $f3, array $args = []) {				
		$sql  = "SELECT id, value FROM master where table_field='".$args['func']."';";		
		$data = $this->mapper->get_all($sql);		
		\View\JSON::instance()->serve($data); 				
	}	

	public function mbox(\Base $f3, array $args = []) {				
		$sql = "SELECT recepient, sub, body ";
		$sql .= "FROM mbox WHERE timestamp < now() LIMIT 1";
		$data = $this->mapper->get_all($sql);
		
	}

}