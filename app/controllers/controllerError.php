<?php

class ControllerError extends Controller{

	//не найден контроллер или экшен
	 static public function notFoundAction($controllerName = "", $actionName = ""){
		View::generate($notFoundView, $templateView);
		die;
	}

	//ошибка выполнения действия
	static public function errorAction($errno , $errstr = "" , $errfile = "", $errline = -1, $errcontext){
		View::generate($errorView, $templateView);
		die;
	}

	//исключенное действие
	static public function exceptionAction(Exception $ex = null){
		View::generate($errorView, $templateView);
		die;
	}

	//класс экшена не найден
	public function classNotFoundAction($className = ""){
		$this->view->className = $className;
		View::generate($notFoundView, $templateView);
		die;
	}
}