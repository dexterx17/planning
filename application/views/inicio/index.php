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
			<div class="box">
					<div class="box-header">
					<h3 class="box-title"><?php echo lang('scrum_singular'); ?></h3>
				</div>
				<div class="box-body">

					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><?php echo lang('scrum_roles'); ?></h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-lg-4">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_product_owner'); ?></h3>
										</div>
										<div class="box-body">
											<ul>
												<li>Representa al cliente final</li>
												<li>Caracteristicas correctas</li>
												<li>Administra los items del backlog</li>
												<li>Asegurarse que el equipo entienda las especificaciones</li>
												<li>Recolecta las necesidades de las distintas areas para transmitirlas al equipo</li>
												<li>Acepta y valida los resultados en la Reunión de Revisión</li>
											</ul>


										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_scrum_master'); ?></h3>
										</div>
										<div class="box-body">
											<ul>
												<li>Al servicio del Equipo</li>
												<li>Protege al equipo de requerimientos e interrupciones</li>
												<li>Mantiene al equipo enfocado</li>
												<li>Elimina impedimentos del equipo</li>
												<li>Asegura una comunicación eficiente entre el Equipo y el Dueño de producto </li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_team'); ?></h3>
										</div>
										<div class="box-body">
											<p>Auto-organizado</p>
											<p>Seguir el mismo objetivo</p>
											<p>Adherirse a las mismas normas y reglas</p>
											<p>Mostrar respeto mutuo</p>
											<p>Crear tareas</p>
											<p>Garantizar que al final del sprint se va a tener un producto entregable</p>
											<p>Actualizar el estado y el esfuerzo empleado en las tareas para permitir la creacion del BurnDown Chart</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><?php echo lang('scrum_artefactos'); ?></h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-lg-4">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_backlog'); ?></h3>
										</div>
										<div class="box-body">
											<p>Lista de los requerimientos proirizados con una pequeña descripción de todas las caracteristicas deseadas.</p>
											<p>Un típico blackog se compone de Carácteristicas, Bugs, Trabajo técnico, Adquisición de conocimiento.</p>
											<p>Yo como ACTOR, QUIERO/DEBO de tal manera que OBJETIVO</p>
											<p>Yo como ACTOR, QUIERO/DEBO OBJETIVO</p>
											<p>ACTOR <small>Usuario, recomendable especificar actores como "Administrador", "Visitante sin autentificar", "Comunicador", etc.</small></p>											
											<p>ACCIÓN<small>Qué es lo que el usuario quiere hacer</small></p>
											<p>OBJETIO<small>Qué es lo que el usuario quiero obtener al ejecutar la acción.Es el resultado obtenido de la acción desde el puntos de vista del actor.</small></p>
											<p>Como <strong>Vendedor</strong> <strong>Quiero</strong> ver el catalogo de productos a la venta <strong>DE TAL MANERA</strong>que yo puedo ordenar uno de ellos</p>
											<p>Como <strong>Administrador</strong> <strong>Debo </strong> deshabilitar cuentas</p>
											<p>Como <strong>Administrador</strong> <strong>Quiero </strong>agregar una cuenta</p>
											<p>Como <strong>Comunicador</strong> debo aprobar o desaprobar comentarios</p>
											<ul>
												<li>I ndependiente</li>
												<li>N egociable</li>
												<li>V aluable<small>Valor para el cliente</small></li>
												<li>E stimable</li>
												<li>S pequeña</li>
												<li>T estiable</li>
											</ul>
											<p>Visible para todos</p>

										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_sprint_backlog'); ?></h3>
										</div>
										<div class="box-body">
											
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_burndown_chart'); ?></h3>
										</div>
										<div class="box-body">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><?php echo lang('scrum_reuniones'); ?></h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-lg-3">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_sprint_planning'); ?>t</h3>
										</div>
										<div class="box-body">
											
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_sprint_review'); ?>t</h3>
										</div>
										<div class="box-body">
											
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_sprint_daily'); ?></h3>
										</div>
										<div class="box-body">
											
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title"><?php echo lang('scrum_sprint_retrospective'); ?></h3>
										</div>
										<div class="box-body">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><?php echo lang('scrum_ma_valores'); ?></h3>
						</div>
						<div class="box-body">
							<ul class="list-unstyled">
								<li><?php echo lang('scrum_ma_valor1'); ?></li>
								<li><?php echo lang('scrum_ma_valor2'); ?></li>
								<li><?php echo lang('scrum_ma_valor3'); ?></li>
								<li><?php echo lang('scrum_ma_valor4'); ?></li>
							</ul>
							<p class="text-muted"><?php echo lang('scrum_ma_valor5'); ?></p>
						</div>
					</div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><?php echo lang('scrum_ma_principios'); ?></h3>
						</div>
						<div class="box-body">
							<ul >
								<li><?php echo lang('scrum_ma_principio1'); ?></li>
								<li><?php echo lang('scrum_ma_principio2'); ?></li>
								<li><?php echo lang('scrum_ma_principio3'); ?></li>
								<li><?php echo lang('scrum_ma_principio4'); ?></li>
								<li><?php echo lang('scrum_ma_principio5'); ?></li>
								<li><?php echo lang('scrum_ma_principio6'); ?></li>
								<li><?php echo lang('scrum_ma_principio7'); ?></li>
								<li><?php echo lang('scrum_ma_principio8'); ?></li>
								<li><?php echo lang('scrum_ma_principio9'); ?></li>
								<li><?php echo lang('scrum_ma_principio10'); ?></li>
								<li><?php echo lang('scrum_ma_principio11'); ?></li>
							</ul>
						</div>
					</div>
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
							<p class="text-blue">"Algunas cosas sólo necesitan tiempo... Nueve Mamás no hacen un bebé en un mes".</p>
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
								<li>http://scrummethodology.com/webinars/</li>
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
						 <video height="400" width="100%" controls="controls">
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
