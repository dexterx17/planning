<?php

/**
 * @group Model
 */

class ProyectoTest extends CIUnit_TestCase
{
	protected $tables = array(
		'proyectos'		 => 'proyectos',
		//'user'		  => 'user',
		//'user_group'	=> 'user_group'
	);

	private $_pcm;
	
	public function __construct($name = NULL, array $data = array(), $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
	}
	
	public function setUp()
	{
		parent::tearDown();
		parent::setUp();
		
		$this->CI->load->model('proyecto');
		$this->_pcm = $this->CI->proyecto;
	}

	public function tearDown()
	{
		parent::tearDown();
	}

	public function testGetAll()
	{
		$actual = $this->_pcm->get_all();
		$this->assertEquals(5, count($actual));
	}

}
