<?php
	class LoadBootStrap {
		
		private $init;
		private $bootstrap;
		
		function loadBootStrap($init) {
			$this->setInit($init);
			$this->setBootstrap();
			$this->getBootstrap()->loadFileGeter("JS", $this->getInit()->getBSDirect());
			$this->getBootstrap()->loadFileGeter("CSS", $this->getInit()->getBSDirect());
		}
		
		function setInit($init) {
			$this->init = $init;
		}
		
		function getInit() {
			return $this->init;
		}
		
		function setBootstrap() {
			include_once($this->init->getBSDirect()."/bootstrap_loader.php");
			$this->bootstrap = new BootStrap();
		}
		
		function getBootstrap() {
			return $this->bootstrap;
		}
		
		function printCSSFiles($param, $Array, $init) {
			$this->getBootstrap()->printFiles($param, $Array, $init);
		}
		
		function printJSFiles($param, $Array, $init) {
			$this->getBootstrap()->printFiles($param, $Array, $init);
		}
	}
?>