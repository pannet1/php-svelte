<?php
namespace controller;

final class Addr extends Main {	

	public function beforeroute(\Base $f3, array $args = []){		
		$f3->title = $args['module'];								        		
		$this->mapper = new \model\Query($f3->get('db'), $args['module']);		
	}	

    public function post_add(\Base $f3, array $args = []) {
        $addr = new \model\Addr();        
        $id = $f3->get('POST.people_id');
        $addr->load(['people_id = ?',$id ]);
        $addr->addr1 = $f3->get('POST.addr1');
        $addr->addr2 = $f3->get('POST.addr2');
        $addr->city    = $f3->get('POST.city');
        $addr->country_id = 1;
        $addr->postal_code = $f3->get('POST.postal_code');        
        
        $one = $this->validation->validateCortexMapper($addr);					
        $member = new \model\Member();
        $member->load(['people_id = ?',$id ]);
        $member->ref1 = $f3->get('POST.ref1');
        $member->ref2 = $f3->get('POST.ref2');
        $member->notes = $f3->get('POST.notes');                
        $two = $this->validation->validateCortexMapper($member);	        

        if($one && $two) {                  
            $addr->save();                
            $member->save();    
            \View\JSON::instance()->serve("success");                
         }  else {
                $msg = $f3->get('msg');
          \View\JSON::instance()->error($msg);
         }     
    }
}
