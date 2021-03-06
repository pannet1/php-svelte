<?php
namespace model;

class Member extends \DB\Cortex {
  protected
  $fieldConf = [
    'people_id' => [ array(
        'has_one' => array('\model\People::class','id')
        )],
    'type_id' => [
        'type' => 'INT8',        
        'nullable' => false,     
        'validate_level'=> 1,       
        'validate'=> 'required|integer', 
    ],                 
    'pass' => [        
        'type' => 'VARCHAR100',        
        'nullable' => false,     
        'validate_level'=> 1,               
        'validate'=> 'required|min_len,8'
    ],
    'email' => [
        'type' => 'VARCHAR50',        
        'nullable' => false,
        'validate_level'=> 1,    
        'filter' => 'trim',        
        'validate'=> 'unique|required|valid_email', 
    ],      
],
    $db = 'db',     
    $table = 'member',
    $primary = 'id';        
} 