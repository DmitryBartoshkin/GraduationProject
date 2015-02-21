<?php

class AuthController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$this->view->generatePartial('authView');
	}
}