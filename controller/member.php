<?php
namespace controller;

final class Member extends Main {	

	public function beforeroute(\Base $f3, array $args = []){		
		$f3->title = $args['module'];								        		
		$this->mapper = new \model\Query($f3->get('db'), $args['module']);		
	}	
	
	// get module all  	
	public function get_all(\Base $f3, array $args = []) {				
		$sql  = "SELECT member.id, member.join_date, member.status_id, member.email, ";
		$sql .= "people.first, people.middle, people.last ";
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
		$people->sex_id = $f3->get('POST.sex_id');		
		$many = $this->validation->validateCortexMapper($people);		
		$member = new \model\Member();		
		$member->email  = $f3->get('POST.email');		
		$member->pass = $f3->get('POST.password');
		$member->type_id = 1;
		$one = $this->validation->validateCortexMapper($member, 1);					
		 if($many && $one) {
			$people->save();
			$member->people_id = $people->id;						
			$member->pass = password_hash($f3->get('POST.password'), PASSWORD_DEFAULT);
			$member->token = password_hash($f3->get('POST.email'),PASSWORD_DEFAULT);			
			$member->save();    				        
			$mbox = new \model\Mbox();
			$mbox->recepient = $f3->get('POST.email');		
			$mbox->sub       = "Activate Account";
			$body            = "You received this mail because you registered for ";
			$body           .=  $f3->get('WEB');
			$body           .= " service. click on the below link to confirm your email ";
			$body           .= "and activate the account. \n";
			$body           .=  $f3->get('URI')."/auth/activate?email=".$member->email."&token=".$member->token;
			$mbox->body      = $body;            
			$mbox->save();
			\View\JSON::instance()->serve("success"); 	
         } else {
			$msg = $f3->get('msg');
			if(!$msg)
				$msg = "some strange error occured";
			\View\JSON::instance()->error($msg);
		 }
	}	


	// GET module/@id ONE
	public function get_one(\Base $f3, array $args = []) {	
		$id = $args['id'];		
		$valid = 0;
        if(isset($id)) {		   
           $sql  = "SELECT member.id, member.join_date, member.people_id, member.ref1, member.ref2, member.notes, member.type_id, member.notes, member.email, ";  
           $sql .= "people.first, people.middle, people.last "; 
           $sql .= "FROM member, people ";                                    
           $sql .= "WHERE member.id=$id ";
           $sql .= "AND member.people_id=people.id ";
           $dat1 = $this->mapper->get_all($sql);      			   
           $people_id = $dat1['0']['people_id'];
		   if($people_id>0) {		   
				$valid = 1;
				$sql  = "SELECT addr.addr1, addr.addr2, addr.city, addr.postal_code ";
				$sql .= "FROM addr ";
				$sql .= "WHERE addr.people_id=$people_id";              
				$dat2 = $this->mapper->get_all($sql);                              
				if(is_array($dat2[0])) 
						$valid = 2;				
				else {					
					$dat2[0] = array(
						'addr1' => '',
						'addr2' => '',
						'city' => '',
						'postal_code' => ''
					);
				}
				$data = array_merge_recursive($dat1[0], $dat2[0]);
				\View\JSON::instance()->serve($data);
					
		   }
		   
		   if($valid==0)
		   		\View\JSON::instance()->error("no data found");				           
		   
		}			
	}	

}
