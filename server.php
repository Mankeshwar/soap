<?php 
error_reporting(E_ALL);
class server{
    private $con;
   public function __construct(){
     $this->con = (is_null($this->con)) ? self::connect() :$this->con;
   }
   
   static function connect(){
     $con = mysqli_connect('localhost','root','','soap');
	 try{
			if (!$con) {
				$error  = "Error: Unable to connect to MySQL." . PHP_EOL;
				$error .="Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
				$error .="Debugging error: " . mysqli_connect_error() . PHP_EOL;
				throw new Exception($error);
			}
		return $con;
	 }catch(Exception $e ){
	    echo $e->getMessage();
	 }
    }
   public function getStudentName($id_array){
     $id  = $id_array['id'];
	 $sql = "SELECT * FROM student WHERE id = '$id'";
	 $result = $this->con->query($sql);
	 $studentResult = $result->fetch_assoc();
	 return $studentResult['name'];
	 
	 
	//return 'Mankeshwar Mishra';
   }
} 
   
   
   $params = array('uri' =>'soap/server.php');
   $server = new SoapServer(null,$params);
   $server->setClass('server');
   $server->handle();
   



?>