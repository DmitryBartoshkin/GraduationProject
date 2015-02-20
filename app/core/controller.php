<?php
abstract class Controller {

	public $model;
	public $view;
	protected $session;

	function __construct(){
		$this->view = new View();
		$session = new SessionModel();
		$this->session = $session;
		$this->view->session = $this->session;
	}

	/**
	 * Выполняет перенаправление пользователя на указанный адрес
	 * @param $url
	 */
	public function redirect($url){
		header('Location: ' . $url);
		die;
	}

	public function isPost(){
		return !empty($_POST);
	}

	function actionIndex(){}
}