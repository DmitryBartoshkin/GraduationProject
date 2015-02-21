<?php

class ControllerError extends Controller{

	//не найден контроллер или экшен
	 public function notFoundAction($controllerName = "", $actionName = ""){
		 $this->view->generate('notFoundView');
		die;
	}

	//ошибка выполнения действия
	public function errorAction($errno , $errstr = "" , $errfile = "", $errline = -1, $errcontext){
		$this->view->generate('errorView');
		die;
	}

	//исключенное действие
	public function exceptionAction(Exception $ex = null){
		$this->view->generate('errorView');
		die;
	}

	//класс экшена не найден
	public function classNotFoundAction($className = ""){
		$this->view->className = $className;
		$this->view->generate('notFoundView');
		die;
	}
}