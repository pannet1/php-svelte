<?php
namespace model;

class Addr extends \DB\Cortex {
  protected
  $fieldConf = [
    'people_id' => [ array(
        'has_one' => array('\model\People::class','id')
        )],
        'addr_1' => [
        'type' => 'VARCHAR50',        
        'nullable' => false,        
        'filter' => 'trim',     
        'validate'=> 'required', 
    ],             
        'city' => [
        'type' => 'VARCHAR50',        
        'nullable' => false,        
        'filter' => 'trim',     
        'validate'=> 'required', 
    ],             
        'postal_code' => [
        'type' => 'VARCHAR20',        
        'nullable' => false,        
        'filter' => 'trim',     
        'validate'=> 'required', 
    ],             
],
    $db = 'db',     
    $table = 'member',
    $primary = 'id';        
} 
