<?php

	require_once 'ascii_functions.php';

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

	echo getAsciiArray($testarray);

?>