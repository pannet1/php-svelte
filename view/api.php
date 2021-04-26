<?php
namespace View;

class Api {
    public static function error($data, $http_code = 400, $desc = null){
        if(!($data instanceof \model\Error)) {
            $data = new \model\Error(
                $data, 
                $desc, 
                "HTTP" . $http_code,
                null,
                $http_code,
                null,
                null
            );
        }
        return self::serve(\View\Formatter::instance()->format_error($data));
    }

    public static function success($data){
        return self::serve(\View\Formatter::instance()->format_success($data));
    }

    protected static function serve($data){
        $f3 = \F3::instance();
        if(strtolower($f3->PARAMS['extension']) == 'json' || $f3->PARAMS['extension'] == ''){
            \View\JSON::instance()->serve($data);        
        } else {
            \View\Plain::instance()->serve($data);
        }
    }
}