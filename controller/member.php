<?php
namespace controller;

final class Member extends Main {	

	public function beforeroute(\Base $f3, array $args = []){		
		$f3->title = $args['module'];								        		
		$this->mapper = new \model\Query($f3->get('db'), $args['module']);		
	}	
	
	// get module all  	
	public function get_all(\Base $f3, array $args = []) {				
		$sql  = "SELECT member.id, member.join_date, member.status_id, ";
		$sql .= "people.first, people.middle, people.last, people.email ";
		$sql .= "FROM member, people ";
		$sql .= "WHERE member.people_id=people.id ";
		$sql .= "ORDER BY member.id DESC ";
		$data = $this->mapper->get_all($sql);		
		\View\JSON::instance()->serve($data);			
	}

	// post module add
	public function post_add(\Base $f3, array $args = []) {				
		$fullname = $f3->get('POST.fullname');		
		$names  = explode(" ", $fullname);			
		$people = new \model\People();		
		$people->marital_status_id = $f3->get('POST.marital_status_id');
		$people->title_id = 1;		
		$people->first  = $names[0]; 
		$people->middle = $names[1]; 
		$people->last   = $names[2]; 
		$people->email  = $f3->get('POST.email');		
		$people->sex_id = $f3->get('POST.sex_id');
		$many = $this->validation->validateCortexMapper($people);		
		$member = new \model\Member();		
		$member->type_id = 1;
		$one = $this->validation->validateCortexMapper($member);					
		 if($many && $one) {
			$people->save();
			$member->people_id = $people->id;
			$member->save();            
            \View\JSON::instance()->serve("success"); 		
         } else {
			$msg = $f3->get('error.msg');
			\View\JSON::instance()->error($msg);
		 }
	}	

	// GET module/new form 
	public function get_new(\Base $f3, array $args = []) {		
		$f3->heading = 'Create';		
		$f3->set('content', 'form.htm');		
		echo \Template::instance()->render($f3->AJAX ? $f3->content : 'layout.htm'); 
	}		

	// PUT module/@id update
	public function put_update(\Base $f3, array $args = []) {			
		
	}	

	// GET module/@id ONE
	public function get_one(\Base $f3, array $args = []) {	
		$id = $args['id'];		
        if(isset($id)) {
           $sql  = "SELECT member.id, member.join_date, member.people_id, member.ref1, member.ref2, member.notes, member.type_id, member.notes, ";  
           $sql .= "people.first, people.middle, people.last, people.email  "; 
           $sql .= "FROM member, people ";                                    
           $sql .= "WHERE member.id=$id ";
           $sql .= "AND member.people_id=people.id ";
           $dat1 = $this->mapper->get_all($sql);                              
           $people_id = $dat1['0']['people_id'];
           $dat2 = [];
           $sql  = "SELECT addr.addr1, addr.addr2, addr.city, addr.postal_code ";
           $sql .= "FROM addr ";
           $sql .= "WHERE addr.people_id=$people_id";              
           $dat2 = $this->mapper->get_all($sql);                              
           $data = array_merge_recursive($dat1[0], $dat2[0]);
           \View\JSON::instance()->serve($data);
		}			
	}	
}
