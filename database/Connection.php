<?php 
class Connection{

	protected $isConn;
	protected $datab;
	protected $transaction;

								//un phpmyadmin    pass phpmyadmin     ip 				dbname
	public function __construct($username="postgres", $password ="123", $host="localhost", $dbname="bd_prueba", $options = []){
		
		$this->isConn = TRUE;
		try{
			$this->datab = new PDO("pgsql:host={$host};  dbname={$dbname};", $username, $password, $options);
			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->transaction = $this->datab;
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			//echo 'Connected Successfully!!!';

		}catch(PDOException $e){
			throw new Exception($e->getMessage());			
		}

	}//endDefaultConstructor
 

	//disconnect from db
	public function Disconnect(){
		$this->datab = NULL;//close connection in PDO
		$this->isConn = FALSE;
	}//endDisconnectFunction


	


}//endClassDatabase

 //$con = new Connection(); //for debugging only
//echo '	debug connection';
 ?>