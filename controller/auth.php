<?php
namespace controller;

final class Auth extends Main {	

	public function beforeroute(\Base $f3, array $args = []){		
		$f3->title = $args['module'];								        		
		$this->mapper = new \model\Query($f3->get('db'), 'member');		
	}	

    public function post_login(\Base $f3, array $args = []) {
        $member = new \model\Member();        
        $member->email = $f3->get('POST.email');
        $member->pass = $f3->get('POST.password');       
        $one = $this->validation->validateCortexMapper($member);					                
        
        if($one) {
        $member->load(['email = ?',$f3->get('POST.email') ]);            
        password_verify($f3->get('POST.password'), $member->pass) ?
            $two = true: $f3->set('msg', 'username or password is wrong');
        }
            
        if($one && $two ) {                              
            \View\JSON::instance()->serve("success");                
         }  else {
                $msg = $f3->get('msg');
          \View\JSON::instance()->error($msg);
         }     
    }
}
