/**
 * Carga contenido de una URL en un elemento HTML
 *
 **/
function loadURL(url, container) {
	//console.log(container)

	$.ajax({
		type : "GET",
		url : url,
		dataType : 'html',
		cache : true, // (warning: this will cause a timestamp and will call the request twice)
		beforeSend : function() {
			// cog placed
			container.html('<h1><i class="small progress"></i> Cargando contenido...</h1>');
		
			// Only draw breadcrumb if it is main content material
			// TODO: see the framerate for the animation in touch devices
			
			if (container[0] == $("#contenido2")[0]) {
				//drawBreadCrumb();
				// scroll up
				$("html").animate({
					scrollTop : 0
				}, "fast");
			} 
		},
		/*complete: function(){
	    	// Handle the complete event
	    	// alert("complete")
		},*/
		success : function(data) {
			// cog replaced here...
			// alert("success")
			
			container.css({
				opacity : '0.0'
			}).html(data).delay(50).animate({
				opacity : '1.0',
			}, 300);
			

		},
		error : function(xhr, ajaxOptions, thrownError) {
			container.html('<h4 style="margin-top:10px; display:block; text-align:left"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Página no encontrada.</h4>');
		},
		async : false
	});

	//console.log("ajax request sent");
}

$(document).on('click', '.menu-sec a[href!="#"]', function(e) {
	    e.preventDefault();
	    var $this = $(e.currentTarget);
		loadURL($this.attr('href'),$('#contenido2'));
    });

$(document).on('click', '.btn-embed', function(e) {
    e.preventDefault();
    var $this = $(e.currentTarget);
	loadURL($this.attr('href'),$('#contenido2'));
});

$(document).on('click', '.btn-modal', function(e) {
    e.preventDefault();
    var $this = $(e.currentTarget);
 	$('#myModal .modal-body').load($this.attr('href'),function(result){
	    $('#myModal').modal({show:true});
	});
});


$(document).on('click', '.btn-redirected', function(e) {
    e.preventDefault();
    var $this = $(e.currentTarget);
    
	loadURL($this.attr('href'),$('#'+$this.attr('data-content')));
});

$(document).on('click', '.btn-delete', function(e) {
    e.preventDefault();
    var $this = $(e.currentTarget);
    
	loadURL($this.attr('href'),$('#'+$this.attr('data-content')));
});

$(document).on('click', '.panel-collapse panel-header', function(e) {
    e.preventDefault();
    var $this = $(e.currentTarget);
    
});

$(document).on('click', '.menu-sec a[href!="#"]', function(e) {
    e.preventDefault();
    var $this = $(e.currentTarget);
	loadURL($this.attr('href'),$('#contenido2'));
});

 $('#cancelar').click(function(){
 	$('#tareillas'+'<?php echo $actividad;?>').html('');
 });

 var dragSrcEl = null;
var cols = document.querySelectorAll('.todo-list li');
//guardamos el contenido que queremos cambiar para la transferencia al dejar de arrastrar
function handleDragStart(e) {
 dragSrcEl = this;
 e.dataTransfer.effectAllowed = 'move';
 e.dataTransfer.setData('text/html', this.innerHTML);
}
 
function handleDragOver(e) {
 if (e.preventDefault) {
 e.preventDefault();
 }
 
e.dataTransfer.dropEffect = 'move'; //efecto al mover
 
return false;
}
 
function handleDragEnter(e) {
 this.classList.add('over');//agregamos borde rojo en el estilo css
}
 
function handleDragLeave(e) {
 this.classList.remove('over'); //eliminamos borde rojo en el estilo css
}
 
function handleDrop(e) {
 if (e.stopPropagation) {
 e.stopPropagation(); //evitamos abrir contenido en otra pagina al soltar
 }
 //hacemos el intercambio de contenido html de el elemento origne y destino
 if (dragSrcEl != this) {
 dragSrcEl.innerHTML = this.innerHTML;
 this.innerHTML = e.dataTransfer.getData('text/html');
 this.classList.remove('over');
 }
 
return false;
}
 
function handleDragEnd(e) {
 [].forEach.call(cols, function (col) {
 col.classList.remove('over');//eliminamos el borde rojo de todas las columnas
 });
}
 
//agregamos todos los eventos anteriores a cada columna mediante un ciclo
[].forEach.call(cols, function(col) {
 col.addEventListener('dragstart', handleDragStart, false);
 col.addEventListener('dragenter', handleDragEnter, false);
 col.addEventListener('dragover', handleDragOver, false);
 col.addEventListener('dragleave', handleDragLeave, false);
 col.addEventListener('drop', handleDrop, false);
 col.addEventListener('dragend', handleDragEnd, false);
});

$(document).ready(function(){
	$('.slider').slider();	
});