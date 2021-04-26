<?php
namespace View;

class JSON extends \Prefab {
    public function serve($data){
        $f3 = \F3::instance();
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}