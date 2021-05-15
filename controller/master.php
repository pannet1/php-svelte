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
		$sql = "SELECT id, recepient, sub, body ";
		$sql .= "FROM mbox WHERE timestamp < now() ";
		$sql .= "AND is_sent=0 LIMIT 1";
		$mbox = new \model\Query($f3->get('db'), 'mbox');		
		$arr = $mbox->get_all($sql);
		if($arr[0]['id']>0)
			{	
			$return = \Utils\Postoffice::instance()->mailto(
				$arr[0]['recepient'],
				$arr[0]['sub'],
				$arr[0]['body']
			);					
			if($return) 
				{				
				$id = $arr[0]['id'];				
				$return = $mbox->update_col_val(array('id=?', $id), 'is_sent', 1);				
				}				
			} 				
		$mbox->reset();
	}

	public function mod_val_by_id(\Base $f3, array $args = []) {		
		$mod       = $f3->get('GET.mod');
		$id        = $f3->get('GET.id');
        $col       = $f3->get('GET.col');
        $val       = $f3->get('GET.val');        
		$member    = new \model\Query($f3->get('db'), $mod);		
		$return    = $member->update_col_val(array('id=?', $id), $col, $val);       
		if($return)
			\View\JSON::instance()->serve("value updated"); 
		else	               
			\View\JSON::instance()->error("something was wrong"); 
    }


}