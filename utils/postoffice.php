<?php
namespace Utils;

class Postoffice extends \Prefab {

    public function mailto ($to, $sub="No Subject", $body)
    {	
        $f3 = \Base::instance();		        
        $headers="From: ".$f3->get('SENDER')."\r\n";
        if($to)
            $return = mail($to, $sub, $body, $headers);			     
        if(!$return) {
            $logger = new \Log('mail.log');
            $logger->write("failed to send mail to $to");
        }
        return $return;
    }

}
