<?php
class Route {

	static function start(){

		//действие контроллера по умолчанию
		$controllerName = 'Auth';
		$actionName = 'index';
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		//получаем имя контроллера
		if(!empty($routes[0])){
			$controllerName = $routes[0];
		}

		//получаем имя экшена
		if(!empty($routes[2])){
			$actionName = $routes[2];
		}

		//добавляем префиксы
		$modelName = 'model'.$controllerName;
		$controllerName = 'controller'.$controllerName;
		$actionName = 'action'.$actionName;

		//подхватываем файл с классом модели (файла модели может и не быть)
		$modelFile = strtolower($modelName).'.php';
		$modelPath = "app/models/".$modelFile;
		if(file_exists($modelPath)){
			include "app/models/".$modelFile;
		}

		//подхватываем файл с классом контроллера (файла контроллера может и не быть)
		$controllerFile = strtolower($controllerName).'.php';
		$controllerPath = "app/controllers/".$controllerFile;
		if(file_exists($controllerPath)){
			include "app/controllers/".$controllerFile;
		}
		else{
			Route::ErrorPage404();
		}

		//создаем контроллер
		$controller = new $controllerName;
		$action = $actionName;
		if(method_exists($controller, $action)){
			//вызываем действие контроллера
			$controller->$action();
		}
		else{
			Route::ErrorPage404();
		}
	}

	function ErrorPage404(){
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location'.$host.'404');
	}
}