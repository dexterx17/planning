<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'/libraries/PHPWebSocket.php');
/**
 * Permite realizar tareas generales en el index
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Chat extends MY_Controller {

	var $data;
	var $Server;

    function __construct(){
        parent::__construct();
        set_time_limit(0);
        $this->data['controller_name'] = 'actividades';
    }

	/**
	 * Muestra la pagina de inicio
	 **/
	public function index()
	{
		global $Server;
		// start the server
		$Server = new PHPWebSocket();
		$Server->bind('message', 'wsOnMessage');
		$Server->bind('open', 'wsOnOpen');
		$Server->bind('close', 'wsOnClose');
		// for other computers to connect, you will probably need to change this to your LAN IP or external IP,
		// alternatively use: gethostbyaddr(gethostbyname($_SERVER['SERVER_NAME']))
		$Server->wsStartServer('127.0.0.1', 9300);
	}

	public function room(){
		$this->load->view('chat/room');
	}

	// when a client sends data to the server
	public function wsOnMessage($clientID, $message, $messageLength, $binary) {
		global $Server;
		$ip = long2ip( $Server->wsClients[$clientID][6] );

		// check if message length is 0
		if ($messageLength == 0) {
			$Server->wsClose($clientID);
			return;
		}
		$message = json_decode($message);
		$user =array('user'=>$message->user,'image'=>$message->image,'mensaje'=>$message->mensaje,'fecha'=>date('r'),'cliente'=>$clientID);
		//The speaker is the only person in the room. Don't let them feel lonely.
		if ( sizeof($Server->wsClients) == 1 )
			$Server->wsSend($clientID, json_encode(array('tipo'=>'mensaje','cliente'=>$clientID ,'mensaje'=>"There isn't anyone else in the room, but I'll still listen to you. --Your Trusty Server",'ip'=>$ip)));
		else
			//Send the message to everyone but the person who said it
			foreach ( $Server->wsClients as $id => $client )
				//if ( $id != $clientID )
					$Server->wsSend($id, json_encode(array('tipo'=>'mensaje','cliente'=>$clientID ,'mensaje'=>$user,'ip'=>$ip)));
	}

	// when a client connects
	public function wsOnOpen($clientID)
	{
		global $Server;
		$ip = long2ip( $Server->wsClients[$clientID][6] );

		$Server->log( "$ip ($clientID) has connected." );
		//Send a join notice to everyone but the person who joined
		foreach ( $Server->wsClients as $id => $client )
			if ( $id != $clientID )
				$Server->wsSend($id, json_encode(array('tipo'=>'conexion','cliente'=>$clientID ,'mensaje'=>$client[3],'ip'=>$ip,'clientes'=>count($Server->wsClients))));
	}


	// when a client closes or lost connection
	public function wsOnClose($clientID, $status) {
		global $Server;
		$ip = long2ip( $Server->wsClients[$clientID][6] );

		$Server->log( "$ip ($clientID) has disconnected." );

		//Send a user left notice to everyone in the room
		foreach ( $Server->wsClients as $id => $client )
			$Server->wsSend($id, json_encode(array('tipo'=>'desconexion','cliente'=>$clientID ,'mensaje'=>$client[3],'ip'=>$ip)));
	}
}
