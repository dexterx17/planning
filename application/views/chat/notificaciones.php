<?php $this -> load -> view('inicio/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuarios GCM
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios GCM</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="container">
            <h1>No of Devices Registered: <?php echo count($usuarios); ?></h1>
            <hr/>
            <input type="button" class="notificarme" value="Enviarme actualizaciones" />
            <div id="res">
                
            </div>
            <ul class="devices">
                <?php
                if (count($usuarios) > 0) {
                    ?>
                    <?php
                    foreach ($usuarios as $key => $row) {
                        ?>
                        <li>
                            <form id="<?php echo $row["ID"]; ?>" name="" method="post" onsubmit="return sendPushNotification('<?php echo $row["ID"]; ?>')">
                                <label>Name: </label> <span><?php echo $row["name"] ?></span>
                                <div class="clear"></div>
                                <label>Email:</label> <span><?php echo $row["email"] ?></span>
                                <div class="clear"></div>
                                <div class="send_container">                               
                                    <textarea rows="3" name="message" cols="25" class="txt_message" placeholder="Type message here"></textarea>
                                    <input type="hidden" name="regId" value="<?php echo $row["gcm_regid"] ?>"/>
                                    <input type="submit" class="send_btn" value="Send" onclick=""/>
                                </div>
                            </form>
                        </li>
                    <?php }
                } else { ?>
                    <li>
                        No Users Registered Yet!
                    </li>
                <?php } ?>
            </ul>
        </div>
  
</section>
<?php $this -> load -> view('inicio/footer'); ?>
  <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.notificarme', function(event) {
            event.preventDefault();          
            $.ajax({
                url: '<?php echo site_url("notificaciones/notificar"); ?>',
                type: 'POST',
                data: {},
                success: function(data, textStatus, xhr) {
                      $('#res').html(data);
                },
                error: function(xhr, textStatus, errorThrown) {
                }
            });
        });
            });
            function sendPushNotification(id){
                var data = $('form#'+id).serialize();
                $('form#'+id).unbind('submit');               
                $.ajax({
                    url: '<?php echo site_url("notificaciones/save"); ?>',
                    type: 'POST',
                    data: data,
                    beforeSend: function() {
                         
                    },
                    success: function(data, textStatus, xhr) {
                          $('.txt_message').val("");
                    },
                    error: function(xhr, textStatus, errorThrown) {
                         alert('campos requeridos');
                    }
                });
                return false;
            }
  </script>