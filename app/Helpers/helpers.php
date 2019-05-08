<?php

function convertString($string){
	$char_array =['À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'È'=>'E', 'É'=>'E',
    'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U','Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a','ç'=>'c','è'=>'e', 'é'=>'e','é'=>'e', 'è'=>'e', 'ẻ'=>'e', 'ẽ' => 'e', 'ẹ'=>'e', 'ế'=>'e', 'ề'=>'e', 'ể'=>'e', 'ễ'=>'e', 'ệ'=>'e','ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o','ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' ];
    // Loai bo dau tieng viet
    $string = strtr( $string, $char_array );
    // Chuyen thanh chu thuong
    $string = strtolower($string);
    //Loai bo khoang trang
    $string = str_replace(' ', '', $string);
	return $string;
}