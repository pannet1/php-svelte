<?php
namespace controller;

final class Insecure extends Main {	

	public function beforeroute(\Base $f3, array $args = []){										        
		$f3->title = ucfirst($args['module']);	
	}	
	

	public function index(\Base $f3, array $args = []){		
		$f3->set('content', 'content.htm');		
		echo \Template::instance()->render($f3->AJAX ? $f3->content : 'index.html'); 			
	}	
	
}