<?php
// MySQL table's name
$tableName = 'products';
// Get JSON file and decode contents into PHP arrays/values
// $jsonFile = 'products.json';
$jsonFile = '../json/13062021-products.json';
$jsonData = json_decode(file_get_contents( $jsonFile ), true );
$insertPairs = array();
$pid = '';
//set spice flag to 0 so we can see if it turns on during iteration
$spiceflag = 0;

// Iterate through JSON and build INSERT statements
foreach ( $jsonData as $key=>$val ) {    
        //echo $key . '=>' . $value . '<br>';

        //set spice flag to 0 so we can see if it turns on during iteration
        $spiceflag = 0;
       
        foreach ( $val as $rowKey=>$rowValue ){
            echo $rowKey . '=>' . $rowValue . '<br>';

            $pid = ( $rowKey == "pid" )?? $rowValue;
            $spiceflag = ( $rowKey == "spice" )?? 1;

            $insertPairs[addslashes($rowKey)] = addslashes($rowValue);

        /*      foreach ( $rowValue as $item1=>$item2 ){ 

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

        */
        // break out of the foreach at the current array index and go to next json array item
        // but first we ned to check if the spiceflag has registered
        

    }

    if ( $spiceflag == 1 ){
        // build the json array index
        
        //echo "INSERT INTO `{$tableName}` ({$insertKeys}) VALUES ({$insertVals});" . "\n";

        echo "<br>";
    }

    $insertKeys = '`' . implode('`,`', array_keys($insertPairs)) . '`';
    $insertVals = '"' . implode('","', array_values($insertPairs)) . '"';

    //echo "INSERT INTO `{$tableName}` ({$insertKeys}) VALUES ({$insertVals});" . "\n";
    echo "<br>";      
}
?>