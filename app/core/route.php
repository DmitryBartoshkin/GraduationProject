<?php

class Route{

	private static $controllerName;

	public static function start(){

		$url      = isset( $_GET['url'] ) ? trim( $_GET['url'] ) : APP_DEFAULT_CONTROLLER;
		$urlParts = explode( '/', rtrim( $url, '/' ) );

		$actionParams = array_slice( $urlParts, 2 );

		self::$controllerName = $urlParts[0];

		$controllerName = self::$controllerName . 'Controller';

		$controller = new $controllerName;

		$actionName = isset( $urlParts[1] ) ? $urlParts[1] . 'Action' : 'indexAction';

		if ( method_exists( $controller, $actionName ) ) {
			call_user_func_array( array( $controller, $actionName ), $actionParams );
		} else {
			$controller = new ErrorController();
			$controller->notFoundAction($controller, $actionName);
		}
	}

	/**
	 * Возвращает имя текущего контроллера
	 * @return mixed
	 */
	public static function getCurrentController() {
		return strtolower( self::$controllerName );
	}
}