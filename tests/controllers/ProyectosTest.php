<?php

/**
 * @group Controller
 */

class ProyectosTest extends CIUnit_TestCase
{

	
	public function setUp()
	{
		// Set the tested controller
		$this->CI = set_controller('proyectos');
	}
	

	public function tearDown()
	{

	}

	public function testIndex()
	{
		// Call the controllers method
		$this->CI->index();
		
		// Fetch the buffered output
		$out = output();
		echo "SALIDA";
		print_r($out);
		echo "HASTA aqui";
		echo $out;
		echo "GASTA C";
		// Check if the content is OK
	//	$this->assertSame(0, preg_match('/(error|notice)/i', $out));
	}
	
}
