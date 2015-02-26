<?php

class AppPDOStatement extends PDOStatement{

	protected $db;

	protected function __construct(AppPDO $db){
		$this->db = $db;
	}

	public function execute($input_parameters = null){
		$this->db->addQuery($this->queryString);
		return parent::execute($input_parameters);
	}
}