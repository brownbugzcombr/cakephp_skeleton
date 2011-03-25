<?php
/* Imbnks Test cases generated on: 2011-03-08 16:40:09 : 1299613209*/
App::import('Controller', 'Imagebank.Imbnks');

class TestImbnksController extends ImbnksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ImbnksControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Imbnks =& new TestImbnksController();
		$this->Imbnks->constructClasses();
	}

	function endTest() {
		unset($this->Imbnks);
		ClassRegistry::flush();
	}

}
?>