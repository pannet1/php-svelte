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
            $data =  array(
                'status' => true,
                'id'=> $member->id,
                'hash'=> $member->pass,
                'error' => null,
            );
            \View\JSON::instance()->serve($data);                
         }  else {
                $msg = $f3->get('msg');
          \View\JSON::instance()->error($msg);
         }     
    }

    public function activate(\Base $f3, array $args = []) {
        $email  = $f3->get('GET.email');
        $token  = $f3->get('GET.token');        
        if (!password_verify($email, $token))
            $msg = 'email is invalid'; 
        else {
            $member = new \model\Member();  
            $member->load(['email = ? AND token = ?', $email, $token ]);            
            if($member->dry())
                $msg = 'email not found';
            else
             {
                $joined = new \DateTime($member->join_date);
                $now    = new \DateTime();
                if($joined->diff($now)->days > 1) 
                    $msg = 'The validation link is expired. Signup Again';
                    else {
                        $member->status_id = 2;    
                        $member->save();
                        echo "account activated";
                    }                                              
            }            
        }                   
        if(isset($msg))
            echo $msg;      
    }
    

}
