<?php
	require_once 'ascii_functions.php';
	class Test extends PHPUnit_Framework_TestCase{
		
		protected $array;
		protected $cols;
		protected $keys;
		protected $colors;

		public function setUp(){
			$this->array = $testarray = array(
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
			$this->keys = getKeySet($this->array);
			$this->cols = sizeof($this->keys);
			$this->colors = array("#81c98d","#5553a5","#c70253","#d6caa8");
		}

		public function testNewLine(){
			$this->assertEquals('<br/>',getNewLine());
		}

		public function testGetKeySet(){
			$this->assertEquals(["Name","Color","Element","Likes"],getKeySet($this->array));
		}

		public function testGetLineSeparator(){
			$this->assertEquals("+------------+-------+---------+----------+<br/>",getLineSeparator($this->cols,$this->array,$this->keys));
		}
		
		public function testGetEmptyField(){
			$this->assertEquals("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|",getEmptyField(8));
		}

		public function testGetField(){
			$this->assertEquals("<span style='color: #81c98d'>  Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>|", getField('#81c98d','Name',12));
		}

		public function testGetArrayLine(){
			$this->assertEquals("|<span style='color: #81c98d'>  Trixie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>|<span style='color: #5553a5'>  Green&nbsp;</span>|<span style='color: #c70253'>  Earth&nbsp;&nbsp;&nbsp;</span>|<span style='color: #d6caa8'>  Flowers&nbsp;&nbsp;</span>|<br/>", getArrayLine($this->keys,$this->colors,$this->array[0],$this->array));
		}

		public function testGetColWidth(){
			$this->assertEquals(9, getColWidth($this->array,"Element"));
		}

		public function testGetTableHeading(){
			$this->assertEquals("|<span style='color: #81c98d'>  Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>|<span style='color: #5553a5'>  Color&nbsp;</span>|<span style='color: #c70253'>  Element&nbsp;</span>|<span style='color: #d6caa8'>  Likes&nbsp;&nbsp;&nbsp;&nbsp;</span>|<br/>",getTableHeading($this->colors,$this->keys,$this->array));
		}


	}