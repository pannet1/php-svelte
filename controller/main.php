<?php
// declare(strict_types=1);

namespace controller;

abstract class Main {	
	protected $validation;
	
	function __construct(\Base $f3, array $args = []) {			
		
		$db=new \DB\SQL(
			$f3->get('DBDNS') . $f3->get('DBNAME'),
			$f3->get('DBUSER'),
			$f3->get('DBPASS')
		); 		

		$f3->set('db',$db);		
		
		$this->validation = \Validation::instance();		
		$this->validation->onError(function($text,$key) {	
			// f3 not available in this context ?
			$f3 = \Base::instance();
			// extract custom error from 'en' lang to hive			
			
			if(isset($key)) 
			{				
				$data = array(
				"status" => false,
       	"data"   => null,
				"error"  =>	$f3->get('error.'.$key)
			);														
			}
			\View\JSON::instance()->serve($data); 																											
		});		
  	
	}

	/**
	 * This will be called before a route is executed. Return false to deny the request
	 *
	 * @param \Base $f3
	 * @return bool
	 */
	public function beforeroute(\Base $f3){		
		
		if ($f3->exists('POST')) 						
			$f3->set('POST',Xss_Filter::filter('POST'));					
		return true;
	}
	

}
