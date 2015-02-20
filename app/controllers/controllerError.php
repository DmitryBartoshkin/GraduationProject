<?php

class ControllerError extends Controller{

	//не найден контроллер или экшен
	public function notFoundAction($controllerName = "", $actionName = ""){
		$this->view->render('error/not-found');
		die;
	}

	//ошибка выполнения действия
	public function errorAction($errno , $errstr = "" , $errfile = "", $errline = -1, $errcontext){
		$this->view->render('error/error');
		die;
	}

	//исключенное действие
	public function exceptionAction(Exception $ex = null){
		$this->view->render('error/exception');
		die;
	}

	//класс экшена не найден
	public function classNotFoundAction($className = ""){
		$this->view->className = $className;
		$this->view->render('error/class-not-found');
		die;
	}
}