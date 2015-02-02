<?php $this -> load -> view('inicio/header'); ?>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Inicio
                        <small>DRY - KISS - SOLID - TDD - CI</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
 		 <!-- Main content -->
                <section class="content">

	<section class="seccion">
		<hgroup>
			<h1></h1>
			<h2><h2>
		</hgroup>

		<article>
			<div class="row">
				<div class="col-lg-6">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">SOLID</h3>
						</div>
						<div class="box-body">
							<div class="box-group" id="accordion">
	                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
	                            <div class="panel box">
	                                <div class="box-header">
	                                    <h4 class="box-title">
	                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	                                          Principio de Unica Responsabilida( Single Responsibility Principle!)
	                                        </a>
	                                    </h4>
	                                </div>
	                                <div id="collapseOne" class="panel-collapse collapse in">
	                                    <div class="box-body">
	                                        la noción de que un objeto solo debería tener una única responsabilidad.
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="panel box">
	                                <div class="box-header">
	                                    <h4 class="box-title">
	                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
	                                          Principio Abierto/Cerrado ( Open/closed Principle )
	                                        </a>
	                                    </h4>
	                                </div>
	                                <div id="collapseTwo" class="panel-collapse collapse">
	                                    <div class="box-body">
	                                        la noción de que las “entidades de software … deben estar abiertas para su extensión, pero cerradas para su modificación”.
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="panel box">
	                                <div class="box-header">
	                                    <h4 class="box-title">
	                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
	                                           Principio de sustitución de Liskov ( Liskov Substitution Principle )
	                                        </a>
	                                    </h4>
	                                </div>
	                                <div id="collapseThree" class="panel-collapse collapse">
	                                    <div class="box-body">
	                                        la noción de que los “objetos de un programa deberían ser reemplazables por instancias de sus subtipos sin alterar el correcto funcionamiento del programa”
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="panel box">
	                                <div class="box-header">
	                                    <h4 class="box-title">
	                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
												Principio de Segregación de la Interface (Interface segregation principle) 
	                                        </a>
	                                    </h4>
	                                </div>
	                                <div id="collapseFour" class="panel-collapse collapse">
	                                    <div class="box-body">
	                                        la noción de que “muchas interfaces cliente específicas son mejores que una interfaz de propósito general.”
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="panel box">
	                                <div class="box-header">
	                                    <h4 class="box-title">
	                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
	                                           Principio de Inversión de Dependencia (Dependency inversion principle)
	                                        </a>
	                                    </h4>
	                                </div>
	                                <div id="collapseFive" class="panel-collapse collapse">
	                                    <div class="box-body">
	                                        la noción de que uno debería “Depender de Abstracciones. No depender de concreciones.”
											La Inyección de Dependencias es uno de los métodos que siguen este principio.
											<small>es un patrón de diseño orientado a objetos, en el que se suministran objetos a una clase en lugar de ser la propia clase quien cree el objeto</small>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
						</div>
					</div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Ley de la dilatación y el arte de perder el tiempo
							<small>Las tres leyes fundamentales de Parkinson</small></h3>
						</div>
						<div class="box-body">
							<ul>
								<li>"El trabajo se expande hasta llenar el tiempo de que se dispone para su realización".</li>
								<li>"Los gastos aumentan hasta cubrir todos los ingresos".</li>
								<li>"El tiempo dedicado a cualquier tema de la agenda es inversamente proporcional a su importancia"</li>
							</ul>
							<hr>
							<p class="text-green"> Ley de la ocupación de los espacios vacíos: por mucho espacio que haya en una oficina siempre hará falta más</p>
						</div>
					</div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">WEBS interesante</h3>
						</div>
						<div class="box-body">
							<ul>
								<li>http://itechnode.com/</li>
								<li>http://www.codecademy.com</li>
							</ul>
						</div>
					</div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">USABILIDAD</h3>
						</div>
						<div class="box-body">
							<ul>
								<li>¿Dónde estoy?</li>
								<li>¿Por dónde empiezo?</li>
								<li>¿Dónde han puesto________</li>
								<li>¿Qué es lo más importante de esta página?</li>
								<li>• ¿Por qué lo han llamado de esa forma?</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
				<!--div.box>div.box-header>h3.box-title+div.box-body-->
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Cuando no planificamos</h3>
					</div>
					<div class="box-body">
						<p>En este video se hace una analogía con un desarrollador(Hal) que inicia su jornada sin seguir una planificación, y al finalizar la jornada llega el cliente(Lois) y le hace un pequeño requerimiento más :p</p>
						 <video height="400" width="100%" controls>
						  <source src="<?php echo base_url("assets");?>/no_planning.mp4" type="video/mp4">
						  <source src="<?php echo base_url("assets");?>/no_planning.ogv" type="video/ogg">
						 Su navegador no soporta videos
						</video> 
					</div>
				</div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Unit tests vs. integration tests </h3>
						</div>
						<div class="box-body">
							Por ejemplo asumamos que un boton es usado para abrir un nueva ventana<br />
							Un test unitario solo verifica si la llamada se hace correctamente, mas no si se abre la otra ventana.<br />
							Un test de integración verifica que la ventana se abrio correctamente
						</div>
					</div>
					
					<div class="box">
						<div class="box-body">
							<ul>
								<li>Busca antes de preguntar</li>
								<li>No copies y pegues</li>
								<li>Ten tu propia wiki</li>
								<li>comenta todo lo que sea necesario</li>
								<li>tu equipo en condiciones</li>
								<li>Visualize los objetivos al comenzar la Sesion.</li>
								<li>Recuerde los problemas que vayan surgiendo.</li>
								<li>Controle los Errores.</li>
								<li>Tómate el tiempo para aprender y experimentar con la plataforma de trabajo en primer lugar.</li>
								<li>siéntate con tu equipo y piensa en lo que queréis realmente crear</li> 
								<li> y empezar desde cero. En última instancia, se ahorrará en tiempo y quebraderos de cabeza y obtendrás un código de alta calidad fácilmente mantenible para el futuro.</li>
							</ul>	
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Funcionalidades PLANNING</h3>
						</div>
						<div class="box-body">
							<ul id="ul-arbol">
								<li>Gestion de Usuarios
									<ul>
										<li>Agregar/Editar Usuarios</li>
										<li>Registrar Usuarios</li>
										<li>Iniciar Sesion</li>
										<li>Cerrar Sesion</li>
										<li>Recuperar Clave</li>
									</ul>
								</li>
								<li class="cierre">Gestion de proyectos
									<ul>
										<li>Agregar/Editar Proyectos</li>
										<li>Personas</li>
										<li>Backlog</li>
										<li>Sprints</li>
										<li>Burndown</li>
										<li>Kanban</li>
										<li>Impedimentos</li>
										<li>Riesgos</li>
										<li>Wiki</li>
										<li>Git</li>
										<li>Calendario</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
				
				</div>

			</div>
			
		</article>
	</section>

</section>
<script>

</script>
<?php $this -> load -> view('inicio/footer'); ?>
