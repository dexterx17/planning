<?php $this -> load -> view('inicio/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Chat
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Chat</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="mailbox row">
      <div class="col-xs-12">
          <div class="box box-solid">
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-3 col-sm-4">
                          <!-- BOXES are complex enough to move the .box-header around.
                               This is an example of having the box header within the box body -->
                          <div class="box-header">
                            <div class="user-panel bg-black-gradient">
                                <div class="pull-left image">
                                    <img src="<?php echo base_url('uploads/profiles').'/'.$this->user->imagen; ?>" class="img-circle" alt="User Image" id="chat_image"/>
                                </div>
                                <div class="pull-left info">
                                    <p id="chat_username"><?php echo $this->user->username; ?></p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
                          </div>
                          <!-- Navigation - folders-->
                          <div style="margin-top: 15px;">
                              <ul class="nav nav-pills nav-stacked" id="users-list">
                              </ul>
                          </div>
                      </div><!-- /.col (LEFT) -->
                      <div class="col-md-9 col-sm-8">
                       <!-- Chat box -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <i class="fa fa-comments-o"></i>
                                    <h3 class="box-title">Sala general</h3>
                                    <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                                        <div class="btn-group" data-toggle="btn-toggle" >
                                            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body chat" id="chat-box">
                                    <textarea id='log' name='log' readonly='readonly' class="form-control"></textarea>
                                </div><!-- /.chat -->
                                <div class="box-footer">
                                    <div class="input-group">
                                        <input class="form-control" id='message' name='message' placeholder="Type message..."/>
                                        <div class="input-group-btn">
                                            <button class="btn btn-success btn-send"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box (chat box) --> 
                      </div><!-- /.col (RIGHT) -->
                  </div><!-- /.row -->
              </div><!-- /.box-body -->
              <div class="box-footer clearfix">
                  <div class="pull-right">
                      <small>Usuario online</small>
                  </div>
              </div><!-- box-footer -->
          </div><!-- /.box -->
      </div><!-- /.col (MAIN) -->
  </div>
  <!-- MAILBOX END -->
  
</section>
<?php $this -> load -> view('inicio/footer'); ?>
  <script type="text/javascript">
    var Server;


    function log( text ) {
      $log = $('#log');
      //Add text to log
      $log.append(($log.val()?"\n":'')+text);
      //Autoscroll
      $log[0].scrollTop = $log[0].scrollHeight - $log[0].clientHeight;
    }

    function send( text ) {
      Server.send( 'message', JSON.stringify(text) );
    }

    function item_chat(mensaje){
      $div = $('<div class="item"></div>');
      $img = $('<img src="'+mensaje.image+'" alt="'+mensaje.user+'" class="offline">');
      $div.append($img);
      $p = $('<p class="message"></p>');
      $user = $('<a href="#" class="name"></a>');
      $time = $('<small class="text-muted pull-right"><i class="fa fa-clock-o"></i><span class="date" date-published="'+mensaje.fecha+'">'+timeToDescription(mensaje.fecha)+'</span></small>');
      $user.append($time);
      $user.append(mensaje.user);
      $p.append($user);
      $p.append(mensaje.mensaje);
      $div.append($p);
      return $div
    }

    function item_user(usuario){
      $li = $('<li class="active" id="'+usuario+'"></li>');
      $user = $('<a href="#"></a>');
      $img = $('<img src="'+''+'" alt="'+''+'" class="offline">');
      $user.append($img);
      $user.append('<span>'+usuario+'</span>');
      $li.append($user);
      return $li;
    }

    function update_user(mensaje){
      $li = $('<li class="active" id="'+mensaje.cliente+'"></li>');
      $user = $('<a href="#"></a>');
      $img = $('<img src="'+mensaje.image+'" alt="'+mensaje.user+'" class="img-circle" width="25px" height="25px">');
      $user.append($img);
      $user.append('<span>'+mensaje.user+'</span>');
      $li.append($user);
      return $li;
    }

    $(document).ready(function() {
      log('Connecting...');
      Server = new FancyWebSocket('ws://127.0.0.1:9300');

      var nickname = $('#chat_username').html();
      var imagen = $('#chat_image').attr('src'); // optional

      $('#message').keypress(function(e) {
        if ( e.keyCode == 13 && this.value ) {
          log( 'You: ' + this.value );
          var mensaje =$('#message').val() ;
          var mensaje_data={ 'user':nickname,
                           'image':imagen,
                           'mensaje':mensaje };
          send( mensaje_data);
          $(this).val('');
        }
      });

      $('.btn-send').click(function(event) {
        var mensaje =$('#message').val() ;
         log( 'You: ' + $('#message').val() );
         var mensaje_data={ 'user':nickname,
                           'image':imagen,
                           'mensaje':mensaje};
          send( mensaje_data);
          $('#message').val('');
      });


      //Let the user know we're connected
      Server.bind('open', function() {
        log( "Connected." );
      });


      //OH NOES! Disconnection occurred.
      Server.bind('close', function( data ) {
        log( "Disconnected." );
      });

      //Log any messages sent from server
      Server.bind('message', function( payload ) {
        var res = jQuery.parseJSON(payload);
        log( payload );
        switch(res.tipo){
          case "mensaje":{
            $('#chat-box').append(item_chat(res.mensaje));
            if($('#users-list li#'+res.cliente).length>0){
              $('#users-list li#'+res.cliente).replaceWith(update_user(res.mensaje));
            }
            else
              $('#users-list').append(update_user(res.mensaje));
            startTimeMonitor();
          }break;
          case "conexion":{
            $('#users-list').append(item_user(res.cliente));
          }break;
          case "desconexion":{
            $('#users-list li#'+res.cliente).fadeOut('slow');
          }break;
        }
      });

      Server.connect();
    });

  /* @private */
  function startTimeMonitor() {
    setInterval(function() {
      $('#chat-box').children('.item ').each(function(i, el) {
        var timeEl = $(el).find('p small span.date');
        var time = timeEl.attr('date-published');
        var newDesc = timeToDescription(time);
        timeEl.text(newDesc);
      });
    }, 10 * 1000);
  };

  /**
   * converts a string or date parameter into a 'social media style'
   * time description.
   */
  function timeToDescription(time) {
    if (time instanceof Date === false) {
      time = new Date(Date.parse(time));
    }
    var desc = "dunno";
    var now = new Date();
    var howLongAgo = (now - time);
    var seconds = Math.round(howLongAgo / 1000);
    var minutes = Math.round(seconds / 60);
    var hours = Math.round(minutes / 60);
    if (seconds === 0) {
      desc = "Ahora";
    }
    else if (minutes < 1) {
      desc = seconds + " segundos" + (seconds !== 1 ? "s" : "") + " atrás";
    }
    else if (minutes < 60) {
      desc = "hace " + minutes + " minutos" + (minutes !== 1 ? "s" : "") + " atrás";
    }
    else if (hours < 24) {
      desc = "hace " + hours + " horas" + (hours !== 1 ? "s" : "") + " atrás";
    }
    else {
      desc = time.getDay() + " " + ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sept", "Oct", "Nov", "Dic"][time.getMonth()];
    }
    return desc;
  }
  ;
  </script>