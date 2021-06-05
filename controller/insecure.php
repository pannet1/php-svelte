<?php
namespace controller;

final class Insecure extends Main {	
	

	public function beforeroute(\Base $f3, array $args = []){										        				
	}	
	
	// main index page for the app
	public function index(\Base $f3, array $args = []){		
		$f3->set('content', 'content.htm');		
		echo \Template::instance()->render($f3->AJAX ? $f3->content : 'svelte.html'); 			
	}		  	
	
	// TODO 
	// master table select for all 
	public function select(\Base $f3, array $args = []) {			
		$mapper = new \model\Query($f3->get('db'), 'master');			
		$sql  = "SELECT id, value FROM master where table_field='".$args['func']."';";		
		$data = $mapper->get_all($sql);		
		\View\JSON::instance()->serve($data); 				
	}	

	// run by cron
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
		$name      = $f3->get('GET.name');
		$id        = $f3->get('GET.id');
        $col       = $f3->get('GET.col');
        $val       = $f3->get('GET.val');                
		
		$mapper    = new \model\Query($f3->get('db'), $name);						
		$return = $mapper->update_col_val(array('id=?', $id), $col, $val);       		
		
		if($return)
		{   
			// membership accepted
			if($name=='member' && $col == 'status_id' && $val == 3) {
				$member = new \model\Query($f3->get('db'), $name);
				$email = $member->find_val_by_id($id, 'email');
				if($email) {
					$mbox = new \model\Mbox();				
					$mbox->recepient = $f3->get('POST.email');		
					$mbox->sub       = "Membership request accepted";
					$body            = "We are happy to inform you that your ";
					$body           .=  $f3->get('WEB')." ";
					$body           .= "membershp request is accepted.  \n";
					$body           .= "Please complete the payment process by clicking on the link below.";
					$body           .=  $f3->get('URI')."/pg?id=".$id;
					$mbox->body      = $body;            
					$mbox->save();								
				} else { $msg = "unable to find email for that member"; }
			}

			if($name=='member' && $col == 'status_id' && $val == 0) {
				$member = new \model\Query($f3->get('db'), $name);
				$email = $member->find_val_by_id($id, 'email');
				if($email) {
					$mbox = new \model\Mbox();				
					$mbox->recepient = $f3->get('POST.email');		
					$mbox->sub       = "Membership request declined";
					$body            = "We regret to inform you that your ";
					$body           .=  $f3->get('WEB')." ";
					$body           .= "membershp request is declined.   \n";
					$body           .= "You will not be allowed to access our services with immediate effect.";					
					$mbox->body      = $body;            
					$mbox->save();								
				} else { $msg = "unable to find email for that member"; }
			}

		} else {
		$msg = "something went wrong when querying"; }		

		if($msg)
			\View\JSON::instance()->error($msg); 
		else 
			\View\JSON::instance()->serve("success"); 
    }


    public function pg(\Base $f3, array $args = []) {		
        $member_id = $f3->get('GET.id');
        
        if($member_id) {        

        $html = "<a href='/pg?id=".$member_id."&sub=1'>subscribe</a>";
        $html .= " | ";
        $html .= "<a href='/'>home</a>";
        $sql = "SELECT id, ts_fm, ts_to FROM subscription ";
        $sql .="WHERE member_id='$member_id' ";
        $sql .="ORDER BY id DESC ";
        $sql .="LIMIT 5";
        $mpr = new \model\Query($f3->get('db'), 'subscription');
        $arr = $mpr->get_all($sql);
    
        if(is_array($arr[0]))
            $html .= \Services::instance()->build_table($arr);

         if($f3->get('GET.sub')==1) {
            $s = new \model\Subscription();
            $s->member_id = $member_id;
            if(is_array($arr[0])) {
                $s->ts_fm = $arr[0]['ts_to'];
                $now      = new \DateTime($arr[0]['ts_to']);                
                $the      = $now->add(new \DateInterval('P1Y'));  
                $s->ts_to = $the->format($f3->get('TSFMT'));
            } else {
                $now =  new \DateTime('NOW');
                $s->ts_fm = $now->format($f3->get('TSFMT'));
                $the = $now->add(new \DateInterval('P1Y'));
                $s->ts_to = $the->format($f3->get('TSFMT'));
            }
            $s->save();
            $f3->reroute("/pg?id=$member_id");
         }
        echo '<br>';
        echo $html;
        }
    }
	
}
