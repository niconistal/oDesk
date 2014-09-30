<?php
	
	$cols_width = array();

	function getKeySet($array){
		//Given an array of arrays, it returns a set of the keys of the subarrays
		$keys = array();
		foreach ($array as $subarray){
			$tempkeys =  array_keys($subarray);
			$keys = $keys + $tempkeys;
		}
		return $keys;
	}

	function rand_color() {
	    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	}

	function generateColors($array){
		$colors = array();

		for ($i = 0 ; $i < sizeof($array) ; $i++){
			$color = rand_color();
			while(in_array($color, $colors)){
				$color = rand_color();
			}

			$colors[] = $color; 
		}
		return $colors;

	}

	function getLineSeparator($cols, $array,$keys){
		$line = '';
		for($i = 0 ; $i < $cols ; $i++ ){
			$width = getColWidth($array,$keys[$i]);
			$line .= '+';
			for($j = 0; $j < $width; $j++){
				$line .= '-';
			}
		}
		$line .= '+';
		return $line;
	}
	function getEmptyField($width){
		$field = '';
		for( $i = 0 ; $i < $width ; $i++ ){
			$field .= '&nbsp;';
		}
		$field .= "|";
		return $field;
	}
	
	function getField($color,$value,$width){
		$field = "<span style='color: ".$color."'>  ".$value;
		$width = $width - strlen($value) - 1;
		for($i = 0 ; $i < $width ; $i++){
			$field .= '&nbsp;';
		}
		$field .= "</span>|";
		return $field;
	}

	function getArrayLine($keys, $colors, $array_line,$array){
		$line = '&nbsp;|';
		foreach ($keys as $position => $key){
			$width = getColWidth($array,$key);
			if( array_key_exists($key, $array_line)){
				$line .= getField($colors[$position], $array_line[$key],$width);
			}else{
				$line .= getEmptyField($width);
			}
		}

		return $line;
	}

	function getColWidth($array,$key){

		global $cols_width;
		if(array_key_exists($key, $cols_width)){
			return $cols_width[$key];
		}

		$width = 0;

		foreach($array as $subarray){
			if(array_key_exists($key, $subarray)){
				if ($width < strlen($subarray[$key])){
					$width = strlen($subarray[$key]);
				}
			}
		}
		if ($width < strlen($key)){
			$width = strlen($key);
		}

		$width += 2;

		$cols_width[$key] = $width;

		return $cols_width[$key];
	}

	function getTableHeading($colors,$keys,$array){

		$line = '&nbsp;|';

		foreach($keys as $position => $key){
			$width = getColWidth($array,$key);
			$line .= getField($colors[$position],$key,$width);
		}

		return $line;
	}

	function getNewLine(){

		return '<br/>';
	}

	function print_array($array){

		$keys = getKeySet($array);
		$cols = sizeof($keys);
		$colors = generateColors($keys);
		echo getLineSeparator($cols,$array,$keys);
		echo '<br/>';
		echo getTableHeading($colors,$keys);
		echo getNewLine();
		echo getLineSeparator($cols,$array,$keys);
		echo '<br/>';
		foreach($array as $subarray){
			echo getArrayLine($keys,$colors,$subarray);
			echo '<br/>';
			echo getLineSeparator($cols,$array,$keys);
			echo '<br/>';
		}

	}

	$testarray = array(
    array(
        'Name' => 'Trixie',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
        ),
    array(
        'Name' => 'Tinkerbell',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue'
        ), 
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Blum',
        'Color' => 'Pink'
        ),
);
	print_array($testarray);

?>
