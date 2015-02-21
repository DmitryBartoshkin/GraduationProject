<?php

class TemplateController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$this->view->generatePartial('templateView');
	}
}