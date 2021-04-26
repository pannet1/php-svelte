<?php
namespace model;

class People extends \DB\Cortex {
  protected
  $fieldConf = [
    'title_id' => [
        'type' => 'TINYINT',        
        'nullable' => false,
        'filter' => 'trim',    
        'validate'=> 'required|integer',
    ],  
    'email' => [
        'type' => 'VARCHAR50',        
        'nullable' => false,
        'filter' => 'trim',        
        'validate'=> 'required|valid_email', 
    ],                
    'first' => [
        'type' => 'VARCHAR25',        
        'nullable' => false,
        'filter' => 'trim',        
        'validate'=> 'required|alpha',
    ],    
    'middle' => [
        'type' => 'VARCHAR25',        
        'nullable' => true,
        'filter' => 'trim',           
        'validate'=> 'alpha',     
    ],    
    'last' => [
        'type' => 'VARCHAR25',        
        'nullable' => true,
        'filter' => 'trim',       
        'validate'=> 'alpha',              
    ],       
    'sex_id' => [
        'type' => 'TINYINT',        
        'nullable' => false,        
        'validate'=> 'numeric',  
    ],     
    'marital_status_id' => [
        'type' => 'TINYINT',        
        'nullable' => false,
        'validate'=> 'numeric',  
    ],     
],
    $db = 'db',     
    $table = 'people',
    $primary = 'id';        
} 