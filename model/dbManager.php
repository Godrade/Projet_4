<?php

class dbManager {

	protected $_db;

	public function __construct(){
		$this->setDb();
	}

	//Setter
	public function setDb(){
		$this->_db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
	}

	//Getter
	public function getDb(){ return $this->_db; }
	
}


