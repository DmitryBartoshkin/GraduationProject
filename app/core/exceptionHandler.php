<?php

function exceptionHandler(Exception $ex){
	$controller = new ErrorController();
	$controller->exceptionAction($ex);

	return true;
}

set_exception_handler('exceptionHandler');