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
		//$this->CI->db->query("set foreign_key_checks=0");
		//parent::setUp();
		
		$this->CI->load->model('proyecto');
		$this->_pcm = $this->CI->proyecto;
	}

	public function tearDown()
	{
		//$this->CI->db->query("set foreign_key_checks=1");
		//parent::tearDown();
	}

	public function testFailSaveInsertingWrongForeignKey(){
		$proyecto_data = array(
			'nick'=>'TESTING CIUNIT',
			'nombre'=>'TESTING CIUNIT',
			'descripcion'=>'descripcion',
			'fecha_inicio'=>date('Y-m-d H:i:s'),
			'fecha_fin'=>date('Y-m-d H:i:s'),
			'presupuesto'=>0,
			'owner'=>"testo",
			'visibilidad'=>"joder"
			);

		$resultado = $this->_pcm->save(-1,$proyecto_data);
		$this->assertTrue($resultado['error']);
		$this->assertEquals(1452,$resultado['code']);

	}

	/**
	 * @depends testFailSaveInsertingWrongForeignKey
	 **/
	public function testSaveInserting(){
		$proyecto_data = array(
			'nick'=>'TESTING CIUNIT',
			'nombre'=>'TESTING CIUNIT',
			'descripcion'=>'descripcion',
			'fecha_inicio'=>date('Y-m-d H:i:s'),
			'fecha_fin'=>date('Y-m-d H:i:s'),
			'presupuesto'=>0,
			'owner'=>1,
			'visibilidad'=>1
			);

		$resultado = $this->_pcm->save(-1,$proyecto_data);
		$this->assertFalse($resultado['error']);
		$this->assertGreaterThan(0,$resultado['ID']);
		return $resultado['ID'];
	}

	/**
	 * @depends testSaveInserting
	 **/
	public function testFailSaveInsertingDuplicateNick(){
		$proyecto_data = array(
			'nick'=>'TESTING CIUNIT',
			'nombre'=>'TESTING CIUNIT',
			'descripcion'=>'descripcion',
			'fecha_inicio'=>date('Y-m-d H:i:s'),
			'fecha_fin'=>date('Y-m-d H:i:s'),
			'presupuesto'=>0,
			'owner'=>"testo",
			'visibilidad'=>"joder"
			);

		$resultado = $this->_pcm->save(-1,$proyecto_data);
		$this->assertTrue($resultado['error']);
		$this->assertEquals(1062,$resultado['code']);
		$this->assertEquals("Duplicate entry 'TESTING CIUNIT' for key 'nick'",$resultado['msg']);
	}

	/**
	 * @depends testSaveInserting
	 **/
	public function testFailSaveUpdatingWrongForeingKey(){
		$proyecto_data = array(
			'nick'=>'TESTING CIUNIT',
			'nombre'=>'TESTING CIUNIT UPDATED!',
			'descripcion'=>'descripcion',
			'fecha_inicio'=>date('Y-m-d H:i:s'),
			'fecha_fin'=>date('Y-m-d H:i:s'),
			'presupuesto'=>0,
			'owner'=>"joder",
			'visibilidad'=>"joder"
			);
		$ID = func_get_args();
		$resultado = $this->_pcm->save($ID[0],$proyecto_data);
		$this->assertTrue($resultado['error']);
		$this->assertEquals(1452,$resultado['code']);
	}

	/**
	 * @depends testSaveInserting
	 **/
	public function testSaveUpdating(){
		$proyecto_data = array(
			'nick'=>'TESTING CIUNIT',
			'nombre'=>'TESTING CIUNIT UPDATED!',
			'descripcion'=>'descripcion',
			'fecha_inicio'=>date('Y-m-d H:i:s'),
			'fecha_fin'=>date('Y-m-d H:i:s'),
			'presupuesto'=>0,
			'owner'=>1,
			'visibilidad'=>"joder"
			);
		$ID = func_get_args();
		$resultado = $this->_pcm->save($ID[0],$proyecto_data);
		$this->assertFalse($resultado['error']);
		$this->assertEquals(1,$resultado['actualizados']);
		return $ID[0];
	}

	/**
	 * @depends testSaveInserting
	 **/
	public function testExists(){
		$ID = func_get_args();
		$resultado = $this->_pcm->exists($ID[0]);
		$this->assertTrue($resultado);
	}

	public function testNoExists(){
		$resultado = $this->_pcm->exists(-1);
		$this->assertFalse($resultado);
	}

	/**
	 * @depends testSaveInserting
	 **/
	public function testGetIds(){
		$ID = func_get_args();
		$resultado = $this->_pcm->get_ids(array());
		$this->assertNotEmpty($resultado);
		$this->assertContains($ID[0],$resultado);
		return $resultado;
	}

	public function testGetIdsEmpty(){
		$resultado = $this->_pcm->get_ids(array('presupuesto >'=>10000));
		$this->assertEmpty($resultado);
	}

	public function testGetInfoEmpty(){
		//ID no existente
		$resultado = $this->_pcm->get_info(100000);
		$proyecto_data = array(
			'ID'=>'',
			'nick'=>'',
			'nombre'=>'',
			'descripcion'=>'',
			'fecha_inicio'=>'',
			'fecha_fin'=>'',
			'presupuesto'=>'',
			'owner'=>'',
			'visibilidad'=>''
			);
		$this->assertEquals($proyecto_data,$resultado);
	}

	/**
	 * @depends testSaveUpdating
	 **/
	public function testGetInfo(){
		$ID = func_get_args();
		$resultado = $this->_pcm->get_info($ID[0]);
		$this->assertNotEmpty($resultado);
		$this->assertEquals('TESTING CIUNIT UPDATED!',$resultado->nombre);
	}

	public function testGetAll()
	{
		$resultado = $this->_pcm->get_all();
		$this->assertNotEmpty($resultado);
		$this->assertEquals(6, count($resultado));
	}

	/**
	 * @depends testGetIds
	 **/
	public function testGetWhereIn(){
		$IDS = func_get_args();
		$resultado = $this->_pcm->get_where_in($IDS[0]);
		$this->assertNotEmpty($resultado);
		$this->assertEquals(6, count($resultado));
	}

	public function testGetWhereInEmpty(){
		$resultado = $this->_pcm->get_where_in("lol");
		$this->assertEmpty($resultado);
	}

	public function testGetWithLimits(){
		$resultado = $this->_pcm->get_with_limits(0);
		$this->assertNotEmpty($resultado);
		$this->assertEquals(6, count($resultado));
	}


	public function testFailDeleteForeignKey(){
		$resultado = $this->_pcm->delete(2);
		$this->assertTrue($resultado['error']);
		$this->assertEquals(1451,$resultado['code']);
	}

	/**
	 * @depends testSaveUpdating
	 **/
	public function testDelete(){
		$ID = func_get_args();
		$resultado = $this->_pcm->delete($ID[0]);
		$this->assertFalse($resultado['error']);
		$this->assertEquals(1,$resultado['eliminado']);
	}

}
