<?php
// MySQL table's name
$tableName = 'products';
// Get JSON file and decode contents into PHP arrays/values
// $jsonFile = 'products.json';
$jsonFile = './json/12062021-products.json';
$jsonData = json_decode(file_get_contents( $jsonFile ), true );

// Iterate through JSON and build INSERT statements
foreach ( $jsonData as $id=>$row ) {
     $insertPairs = array();
    foreach ($row as $key=>$val) {
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
        $insertKeys = '`' . implode('`,`', array_keys($insertPairs)) . '`';
        $insertVals = '"' . implode('","', array_values($insertPairs)) . '"';
        echo "INSERT INTO `{$tableName}` ({$insertKeys}) VALUES ({$insertVals});" . "\n";
        echo "<br>";
    }    
}
?>