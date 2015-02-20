<?php

// Подгрузка моделей
spl_autoload_register(function ($class) {
	$modelFlag = strpos($class, 'Model');
	if ($modelFlag === FALSE) {
		return FALSE;
	}

	if ($class == 'Model') {
		require_once(APP_BASE_PATH.'/app/core/model.php');
		return true;
	}
});

// Подгрузка контроллеров
spl_autoload_register(function ($class) {

	$controllerFlag = strpos($class, 'Controller');
	if ($controllerFlag === FALSE) {
		return FALSE;
	}

	if ($class == 'Controller') {
		require_once(APP_BASE_PATH.'/app/core/controller.php');
		return true;
	}
});