<?php
	require_once 'index.php';
	class Test extends PHPUnit_Framework_TestCase{
		public function testNewLine(){
			$this->assertEquals('<br/>',getNewLine());
		}
	}