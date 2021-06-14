<?php
// Get JSON file and decode contents into PHP arrays/values
$jsonFile = '15062021_products.json';
$jsonData = json_decode(file_get_contents( $jsonFile ), true );
$jsonProduct = fopen("products.json", "w") or die("Unable to open file!");'products.json';
$array = [['items'=>'']];
$json_string = '{"items": [';
$jsonDataLength = count($jsonData['items']);
$counter = 0;
$json_piece = '';
$json_piece_size = '';
$json_piece_spice = '';

// Iterate through JSON and build INSERT statements
foreach ( $jsonData as $id => $row ) { // gets array filled with json data
    //echo $id . ' => ' . $row . '<br>';
    
   foreach ($row as $key=>$val) { // seeks array pointer to iterate ovr json data
        // echo $key . '<br>';

       foreach ( $val as $rowKey=>$rowValue ){ // gets sys node
        //echo $rowKey . ' => ' . $rowValue . '<br>';

           foreach ( $rowValue as $item1=>$item2 ){  // gets id field
               if ( $item1 == "image" ){
                   foreach ( $item2 as $fieldsKey=>$fieldsVal ){
                    // echo $fieldsKey . ' => ' . $fieldsVal . '<br>';
                       foreach ( $fieldsVal as $fileKey=>$fileVal ){
                        // echo $fileKey . ' => ' . $fileVal . '<br>';
                           foreach ( $fileVal as $urlKey=>$urlVal ){
                               $item1 = $urlKey;
                               $temp = $urlVal;
                               $item2 = str_replace('../img/order/', '', $temp);
                               $array[addslashes($urlKey)] = addslashes($urlVal);
                           }   
                       }   
                   }      
               } else {
                   if( is_float( $item2) || is_integer( $item2 ) || is_int( $item2 ) )
                   {                       
                        $array[addslashes($item1)] = addslashes($item2);
                        
                   } else {      
                        $array[addslashes($item1)] = addslashes($item2);
                   }
               }        
           }
       }

       foreach( $array as $key => $value ){
            if( $key == "id" ){
                $id = $value;
            }
            if( $key == "title" ){
                $title = $value;                
            }
            if( $key == "price" ){
                $price = $value;                
            }
            if( $key == "product_description" ){
                $product_description = $value;                 
            }
            if( $key == "size" ){
                $size = $value;                  
            }
            if( $key == "spice" ){
                $spice = $value;                   
            }
            if( $key == "suspend" ){
                $suspend = $value;
            }
            if( $key == "cid" ){
                $cid = $value;
            }
            if( $key == "product_image" ){
                $product_image = $value;                   
            }
       }

       // build the json string
    if( $size == 0 && $spice == 0 ){
        $json_piece = '';
        $json_piece = '{
            "sys": {
                "id": "'. $id . '",
                "pid": "'. $id . '",
                "cid": "'. $cid . '"
            },
            "fields": {
                "title": "'. $title . '",
                "price": '. $price . ',
                "product_description": "'. $product_description . '",
                "size": '. $size . ',
                "spice": '. $spice . ',
                "suspend": "'. $suspend . '",
                "image": {
                    "fields": {
                        "file": {
                            "product_image": "'. $product_image . '"
                        }
                    }
                }
            }        
        }';
        $json_string .= $json_piece . ',';
    }
    

    if( $size == 1 ){
        $json_piece_size = '';
        $json_piece_size = '{
            "sys": {
                "id": "'. $id . 'small",
                "pid": "'. $id . '",
                "cid": "'. $cid . '"
            },
            "fields": {
                "title": "'. $title . '",
                "price": '. $price . ',
                "product_description": "'. $product_description . '",
                "size": '. $size . ',
                "spice": '. $spice . ',
                "suspend": "'. $suspend . '",
                "image": {
                    "fields": {
                        "file": {
                            "product_image": "'. $product_image . '"
                        }
                    }
                }
            }
        },{
            "sys": {
                "id": "'. $id . 'large",
                "pid": "'. $id . '",
                "cid": "'. $cid . '"
            },
            "fields": {
                "title": "'. $title . '",
                "price": '. $price . ',
                "product_description": "'. $product_description . '",
                "size": '. $size . ',
                "spice": '. $spice . ',
                "suspend": "'. $suspend . '",
                "image": {
                    "fields": {
                        "file": {
                            "product_image": "'. $product_image . '"
                        }
                    }
                }
            }
        }';
        $json_string .= $json_piece_size . ',';
    }

    if( $spice == 1 ){
        $json_piece_spice = '';
        $json_piece_spice = '{
            "sys": {
                "id": "'. $id . 'mild",
                "pid": "'. $id . '",
                "cid": "'. $cid . '"
            },
            "fields": {
                "title": "'. $title . '",
                "price": '. $price . ',
                "product_description": "'. $product_description . '",
                "size": '. $size . ',
                "spice": '. $spice . ',
                "suspend": "'. $suspend . '",
                "image": {
                    "fields": {
                        "file": {
                            "product_image": "'. $product_image . '"
                        }
                    }
                }
            }
        },{
            "sys": {
                "id": "'. $id . 'medium",
                "pid": "'. $id . '",
                "cid": "'. $cid . '"
            },
            "fields": {
                "title": "'. $title . '",
                "price": '. $price . ',
                "product_description": "'. $product_description . '",
                "size": '. $size . ',
                "spice": '. $spice . ',
                "suspend": "'. $suspend . '",
                "image": {
                    "fields": {
                        "file": {
                            "product_image": "'. $product_image . '"
                        }
                    }
                }
            }
        },{
            "sys": {
                "id": "'. $id . 'hot",
                "pid": "'. $id . '",
                "cid": "'. $cid . '"
            },
            "fields": {
                "title": "'. $title . '",
                "price": '. $price . ',
                "product_description": "'. $product_description . '",
                "size": '. $size . ',
                "spice": '. $spice . ',
                "suspend": "'. $suspend . '",
                "image": {
                    "fields": {
                        "file": {
                            "product_image": "'. $product_image . '"
                        }
                    }
                }
            }
        }';        
        $json_string .= $json_piece_spice . ',';
    }
   }
}

$json_string = substr($json_string, 0, -1);
$json_string .= '] }';

// write to file
fwrite( $jsonProduct, $json_string);
fclose( $jsonProduct );

echo $json_string;
?>