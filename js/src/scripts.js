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
		cache : false, // (warning: this will cause a timestamp and will call the request twice)
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
    container =$('#'+$this.attr('data-content'));
    $.ajax({
		type : "GET",
		url : $this.attr('href'),
		dataType : 'json',
		cache : false, // (warning: this will cause a timestamp and will call the request twice)
		success : function(data) {
			if(!data.error){
				container.fadeOut('slow').delay(50).animate({
					opacity : '1.0',
				}, 300).remove();
			}else{
				alert(data.message);
			}
		},
		error : function(xhr, ajaxOptions, thrownError) {
			container.html('<h4 style="margin-top:10px; display:block; text-align:left"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Página no encontrada.</h4>');
		},
		async : false
	});

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

$(document).on('click','.contador-tareas button',function(){
    $btn  = $(this);
    $btn.toggleClass('active',function(){
    	if($btn.css('opacity')==1){
    		$btn.animate({'opacity':0.5}, 200);
    	}else{
    		$btn.animate({'opacity':1}, 200);
    	}

		var  ids=[];
		for (var i = 1; i <= 3; i++) {
			if(i==parseInt($btn.attr('status'))){
				ids[i-1]=$btn.hasClass('active')?i:0;
			}else{
				ids[i-1]=$('.contador-tareas button[status="'+i+'"]').hasClass('active')?i:0;
			}
		};
		$("#backlog-content .todo-list").todolist({hide:ids});
    });

});