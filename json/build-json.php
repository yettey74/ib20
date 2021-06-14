<?php
// Get JSON file and decode contents into PHP arrays/values
$jsonFile = 'json/12062021-products.json';
$jsonData = json_decode(file_get_contents( $jsonFile ), true );
$jsonOut = '{
	"items": [{
			"sys": {
				"id": "';

// Iterate through JSON and build INSERT statements
foreach ( $jsonData as $id=>$row ) {
    $insertPairs = array();
    
   foreach ($row as $key=>$val) {
       echo $key . ' => ' . $value . '<br>';

       foreach ( $val as $rowKey=>$rowValue ){
           foreach ( $rowValue as $item1=>$item2 ){ 
               if ( $item1 == "image" ){
                   foreach ( $item2 as $fieldsKey=>$fieldsVal ){
                       foreach ( $fieldsVal as $fileKey=>$fileVal ){
                           foreach ( $fileVal as $urlKey=>$urlVal ){
                               $item1 = $urlKey;
                               $item2 = $urlVal;
                               $final = str_replace('../img/order/', '', $item2);
                               $insertPairs[addslashes($item1)] = addslashes($final);
                           }   
                       }   
                   }      
               } else {
                   $insertPairs[addslashes($item1)] = addslashes($item2);                   
               }        
           }
       }
       
       echo $jsonOut . "\n";
       echo "<br>";
   }    
}
?>