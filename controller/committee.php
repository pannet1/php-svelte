<?php
namespace controller;

final class Committee extends Main {	

	public function beforeroute(\Base $f3, array $args = []){										        		
		$this->mapper = new \Model\Query($f3->get('db'), $args['module']);		
	}	
	
	// get module all  	
	public function get_all(\Base $f3, array $args = []) {				
		$sql  = "SELECT * FROM ".$args['module']." ";
		$sql .= "ORDER BY id DESC ";
		$data = $this->mapper->get_all($sql);				
		\View\JSON::instance()->serve($data);
	}

	// post module add
	public function post_add(\Base $f3, array $args = []) {	
		
	}	

	// GET module/new form 
	public function get_new(\Base $f3, array $args = []) {			
		$f3->heading = 'Create';
		$f3->set('content', $args['module'].'.htm');		
		echo \Template::instance()->render($f3->AJAX ? $f3->content : 'layout.htm'); 	
	}		
	
	// PUT module/@id update
	public function put_update(\Base $f3, array $args = []) {			
		$id = $args['id'];
		if(isset($id))
			$this->mapper->put_update($id) ?
			\View\Api::success() : \View\Api::error();							
	}	

	// GET module/@id/edit 
	public function get_edit(\Base $f3, array $args = []) {	
		$f3->heading = 'Edit';
		$id = $args['id'];
		if(isset($id))
			$this->mapper->findById($id);
		$f3->set('content', $args['module'].'.htm');			
		echo \Template::instance()->render($f3->AJAX ? $f3->content : 'layout.htm'); 	
			
	}	
	
	// DELETE module/@id  	
	public function delete(\Base $f3, array $args = []) {			
		$id = $args['id'];
		if(isset($id)) {
			$this->mapper->delete($id);		
		}
	
	}	

	// GET module/@id ONE
	public function get_one(\Base $f3, array $args = []) {	
		$f3->heading = 'View';
		$id = $args['id'];
		if(isset($id))
			$this->mapper->findById($id);
		$f3->set('content', 'v'.$args['module'].'.htm');			
		echo \Template::instance()->render($f3->AJAX ? $f3->content : 'layout.htm'); 	
	}	

}