<?php

Class SessionModel extends Model{

	protected $user;

	public function __construct(){
		// Добавляем проверку, т.к. при ошибке у нас будет создаваться новый контроллер
		// избегаем появления ошибки 'session already started'
		if(session_id() == '') {
			session_start();
		}

		$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
		if ($userId){
			$this->user = StaffModel::findBy(array('id' => $userId));
		}
	}

	/**
	 * @return bool Флаг залогинен ли текущий пользователь
	 */
	public function isLoggedIn(){
		return isset($_SESSION['firstName']);
	}

	/**
	 * @return string Имя текущего пользователя, если он залогинен
	 */
	public function getName(){
		return $this->user->firstName;
	}

	/**
	 * Попытка залогиниться в систему с указанными данными. Вернет результат попытки
	 * @param $login
	 * @param $pass
	 * @return bool
	 */
	public function login($login, $pass){
		$this->user = StaffModel::findBy(array('login' => $login, 'password' => $pass));
		return (bool)$this->user;
	}

	/**
	 * Выход из системы
	 */
	public function logout(){
		session_destroy();
		$this->user = null;
	}

	public function __destruct(){
		if ($this->user) {
			$_SESSION['userId'] = $this->user->id;
			$_SESSION['firstName'] = $this->user->firstName;
		}
	}
}