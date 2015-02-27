<?php

/**
 * @group Model
 */

class PeopleTest extends CIUnit_TestCase
{
	protected $tables = array(
		'users'		 => 'users',
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
		$this->CI->db->query("set foreign_key_checks=0");
		parent::setUp();
		
		$this->CI->load->model('people');
		$this->_pcm = $this->CI->people;
	}

	public function tearDown()
	{
		$this->CI->db->query("set foreign_key_checks=1");
		parent::tearDown();
		//$this->_pcm->delete_all();
	}

	public function testGetAll()
	{
		$respuesta = $this->_pcm->get_all();
		$this->assertCount(5, $respuesta);
	}

	public function testExists(){
		$id = 1;
		$respuesta = $this->_pcm->exists($id);
		$this->assertTrue($respuesta);
	}

	public function testNoExists(){
		$id = 2;
		$respuesta = $this->_pcm->exists($id);
		$this->assertFalse($respuesta);
	}

	public function testgetInfo(){
		$id = 1;
		$res = $this->_pcm->get_info($id);
		$this->assertEquals(1, count($res));
		$this->assertEquals("administrator", $res->username);
	}

	public function testEmptygetInfo(){
		$id = 2;
		$res = $this->_pcm->get_info($id);
		$this->assertTrue(!empty($res));
		$this->assertNull($res->username);
	}

}
