<?php
class client{

	public function __construct(){
	
	  $params  = array('location'=>'http://soap/server.php',
						'uri' =>'urn://soap/server.php',
						'trace' => 1
	  	               );
					   
		$this->instance = new SoapClient(null, $params);			   
	}
	
	public function getName($id_array){
		return $this->instance->__soapCall('getStudentName',$id_array);
	}
}

$client = new client();


?>
