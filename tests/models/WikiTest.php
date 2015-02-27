<?php

/**
 * @group Model
 */

class WikiTest extends CIUnit_TestCase
{
	protected $tables = array(
		'wiki_page'		 => 'wiki_page',
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
		
		$this->CI->load->model('wik');
		$this->_pcm = $this->CI->wik;
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
		$id = 7;
		$respuesta = $this->_pcm->exists($id);
		$this->assertFalse($respuesta);
	}

	public function testgetInfo(){
		$id = 1;
		$res = $this->_pcm->get_info($id);
		$this->assertEquals(1, count($res));
		$this->assertEquals(7, $res->creador);
	}

	public function testEmptygetInfo(){
		$id = 7;
		$res = $this->_pcm->get_info($id);
		$this->assertTrue(!empty($res));
		//$this->assertEmpty($res['creador']);
	}

	/**
	 * @covers Wik::save
	 **/
	public function testSaveInserting(){
		$info=array(
			'titulo'=>'Wiki page de prueba',
			'contenido'=>'Contenido de prueba',
			'fecha'=>date("Y-m-d H:i:s"),
			'creador'=>1,
			'proyecto'=>1
			);
		$res = $this->_pcm->save(-1,$info);
		$this->assertEquals(6,$res);
	}

	/**
	 * @depends testSaveInserting
	 * @covers Wik::save
	 * */
	public function testSaveUpdating(){
		$info=array(
			'titulo'=>'Wiki page de prueba',
			'contenido'=>'Contenido de prueba',
			'fecha'=>date("Y-m-d H:i:s"),
			'creador'=>1,
			'proyecto'=>1
			);
		$this->assertTrue($this->_pcm->save(-1,$info)>0);

		$info=array(
			'titulo'=>'Wiki page de prueba',
			'contenido'=>'Contenido actualizado',
			'fecha'=>date("Y-m-d H:i:s"),
			'creador'=>1,
			'proyecto'=>1
			);
		$res = $this->_pcm->save(6,$info);
		$this->assertTrue($res);
		
		$datos = $this->_pcm->get_info(6);
		$this->assertEquals('Contenido actualizado',$datos->contenido);
	}

	/**
	 * @depends testSaveUpdating
	 * @covers Wik::delete
	 **/
	public function testDeleteLogico(){
		$info=array(
			'titulo'=>'Wiki page de prueba',
			'contenido'=>'Contenido de prueba',
			'fecha'=>date("Y-m-d H:i:s"),
			'creador'=>1,
			'proyecto'=>1
			);
		$this->assertTrue($this->_pcm->save(-1,$info)>0);

		$this->assertTrue($this->_pcm->delete(6));

		$datos = $this->_pcm->get_info(6);
		$this->assertTrue((boolean)$datos->deleted);	
	}

	/**
	 * @depends testSaveUpdating
	 * @covers Wik::delete
	 **/
	public function testFailDeleteLogico(){
		$info=array(
			'titulo'=>'Wiki page de prueba',
			'contenido'=>'Contenido de prueba',
			'fecha'=>date("Y-m-d H:i:s"),
			'creador'=>1,
			'proyecto'=>1
			);
		$this->assertTrue($this->_pcm->save(-1,$info)>0);

		$this->assertFalse($this->_pcm->delete(7));
		
	}
}
