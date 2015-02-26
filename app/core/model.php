<?php

class Model {

	protected static $dbc;
	protected static $instance;

	public function __construct(){}

	public static function model(){
		if (!self::$instance){
			self::$instance = new self;
		}
	}

	/**
	 * @return AppPDO Возвращает объект соединения с базой данных
	 */
	public static function db(){
		return AppPDO::getInstance();
	}

	/**
	 * Устанавливает в модель группу атрибутов из массива
	 * @param array $arr ассоциативный массив имя свойства - значение
	 */
	public function setAttributes(array $arr){
		foreach ($arr as $key => $val){
			$this->$key = $val;
		}
	}
}