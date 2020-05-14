<?php

class dbManager {
	protected $_db;

	public function __construct(){
		$this->setDb();
	}

	//Setter
	public function setDb(){
		$this->_db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
		//$this->_db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'XWD_u43TY8u309Of34H0');
		//$this->_db = new PDO('mysql:host=sylensfrywopen.mysql.db;dbname=sylensfrywopen;charset=utf8', 'sylensfrywopen', 'Diable666');
	}

	//Getter
	public function getDb(){ return $this->_db; }
	
}