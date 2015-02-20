<?php

function exceptionHandler(Exception $ex){
	$controller = new ControllerError();
	$controller->exceptionAction($ex);

	return true;
}

set_exception_handler('exceptionHandler');