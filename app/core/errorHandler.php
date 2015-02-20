<?php

//обработчик ошибок
function errorHandler($errno = -1 , $errstr = "" , $errfile = "", $errline = -1, $errcontext = array()){
	$controller = new ControllerError();
	$controller->errorAction($errno, $errstr, $errfile, $errline, $errcontext);
	return true;
}

set_error_handler('errorHandler');