<?php
namespace View;

class JSON extends \Prefab {
    public function serve($data){        
        $f3 = \F3::instance();
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        if(is_string($data)) {
            $output = array(
                'status' => true,
                'data' => $data ,
                'error' => null
            );
            echo json_encode($output, JSON_PRETTY_PRINT);
        } else {
            echo json_encode($data, JSON_PRETTY_PRINT);
        }        
    }
    
    public function error(string $msg="something bad happened") {
        $f3 = \F3::instance();
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        $data = array(
           'status' => true,
           'data' => null ,
           'error' => $msg
       );
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}