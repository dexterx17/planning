function loadURL(url,container){$.ajax({type:"GET",url:url,dataType:"html",cache:!0,beforeSend:function(){container.html('<h1><i class="small progress"></i> Cargando contenido...</h1>'),container[0]==$("#contenido2")[0]&&$("html").animate({scrollTop:0},"fast")},success:function(data){container.css({opacity:"0.0"}).html(data).delay(50).animate({opacity:"1.0"},300)},error:function(){container.html('<h4 style="margin-top:10px; display:block; text-align:left"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Página no encontrada.</h4>')},async:!1})}$.menu_speed=235,$(document).ready(function(){$(".menu ul").jarvismenu({accordion:!0,speed:$.menu_speed,closedSign:'<em class="fa fa-plus-square-o"></em>',openedSign:'<em class="fa fa-minus-square-o"></em>'})}),$.fn.extend({jarvismenu:function(options){var defaults={accordion:"true",speed:200,closedSign:"[+]",openedSign:"[-]"},opts=$.extend(defaults,options),$this=$(this);$this.find("li").each(function(){0!=$(this).find("ul").size()&&($(this).find("a:first").append("<b class='collapse-sign'>"+opts.closedSign+"</b>"),"#"==$(this).find("a:first").attr("href")&&$(this).find("a:first").click(function(){return!1}))}),$this.find("li.active").each(function(){$(this).parents("ul").slideDown(opts.speed),$(this).parents("ul").parent("li").find("b:first").html(opts.openedSign),$(this).parents("ul").parent("li").addClass("open")}),$this.find("li a").click(function(){0!=$(this).parent().find("ul").size()&&(opts.accordion&&($(this).parent().find("ul").is(":visible")||(parents=$(this).parent().parents("ul"),visible=$this.find("ul:visible"),visible.each(function(visibleIndex){var close=!0;parents.each(function(parentIndex){return parents[parentIndex]==visible[visibleIndex]?(close=!1,!1):void 0}),close&&$(this).parent().find("ul")!=visible[visibleIndex]&&$(visible[visibleIndex]).slideUp(opts.speed,function(){$(this).parent("li").find("b:first").html(opts.closedSign),$(this).parent("li").removeClass("open")})}))),$(this).parent().find("ul:first").is(":visible")&&!$(this).parent().find("ul:first").hasClass("active")?$(this).parent().find("ul:first").slideUp(opts.speed,function(){$(this).parent("li").removeClass("open"),$(this).parent("li").find("b:first").delay(opts.speed).html(opts.closedSign)}):$(this).parent().find("ul:first").slideDown(opts.speed,function(){$(this).parent("li").addClass("open"),$(this).parent("li").find("b:first").delay(opts.speed).html(opts.openedSign)}))})}}),$(document).on("click",".btn-embed",function(e){e.preventDefault();var $this=$(e.currentTarget);loadURL($this.attr("href"),$("#contenido2"))}),$(document).on("click",".btn-redirected",function(e){e.preventDefault();var $this=$(e.currentTarget);loadURL($this.attr("href"),$("#"+$this.attr("data-content")))}),$(document).on("click",".panel-collapse panel-header",function(e){e.preventDefault();$(e.currentTarget)}),$("#cancelar").click(function(){$("#tareillas<?php echo $actividad;?>").html("")});