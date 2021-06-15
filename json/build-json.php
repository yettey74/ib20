<?php
// Get JSON file and decode contents into PHP arrays/values
$jsonFile = 'a15062021-products.json';
$jsonData = json_decode(file_get_contents( $jsonFile ), true );
$jsonProduct = fopen("products.json", "w") or die("Unable to open file!");'products.json';
$json_string = '{"items": [';
$counter = 0;
$json_piece = '';
$json_piece_size = '';
$json_piece_spice = '';

## Return array jsonDatarows of 1 ITEMS array that holds the catalouge
foreach ( $jsonData as $jsonDatakey => $jsonDatavalue ) { 

    foreach ( $jsonDatavalue as $key => $value ) { 
        
        if( $key == "cid" ){
        $cid = $value;              
        }
        if( $key == "pid" ){
        $pid = $value;              
        }
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
        if ( $key == "product_image" ){                        
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

$json_string = substr($json_string, 0, -1);

$json_string .= '] }';

// write to file
fwrite( $jsonProduct, $json_string);
fclose( $jsonProduct );

echo $json_string;
?>