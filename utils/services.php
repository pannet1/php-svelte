<?php

class Services extends \prefab {

  function build_table($array){
   $html = '<table border="1px" border-collapse="collapse">';
   $html .= '<tr>';

   $cnt = count($array);
    
   for($i=0; $i <= ($cnt-1); $i++) {  

   foreach($array[$i] as $key=>$value){
   $html .= '<th>' . htmlspecialchars($key) . '</th>';
   }
   $html .= '</tr>';
      foreach( $array as $key=>$value){
      $html .= '<tr>';
             foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
     }

   $html .= '</table>';
   return $html;
 
   } // for

  }

}
