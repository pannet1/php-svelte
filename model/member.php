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
        'validate'=> 'required|integer', 
    ],             
],
    $db = 'db',     
    $table = 'member',
    $primary = 'id';        
} 