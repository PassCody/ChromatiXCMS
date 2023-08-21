<?php
	class Initialisation {
		
		private $directForBS;
		private $loadBS;
		
		function getFileLocation() {
			$value = "";
			if (isset($_SERVER["REQUEST_URI"]) AND $_SERVER["REQUEST_URI"] !== "") {
				$value = $_SERVER["REQUEST_URI"];
			}
			return($value);
		}
		
		function getMainDir() {
			$dir = "";
			$getFileLocation = $this->getFileLocation();
			$countetSlashes = substr_count($getFileLocation,"/")-1;
			
			if ($getFileLocation !== "") {
				for ($i = 0; $i < $countetSlashes; $i++) {
					$dir .= "../";
				}
			}
			return $dir;
		}
		
		function getCurrentDirectoryForBS() {
			$dirForBS = "";
			$dirForBS .= $this->getMainDir()."./Libarys/bootstrap";
			return $dirForBS;
		}
		
		function setBSDirect($dirForBS) {
			$this->directForBS = $dirForBS;
		}
		
		function getBSDirect() {
			return $this->directForBS;
		}
		
		function loadBS() {
			$this->setBSDirect($this->getCurrentDirectoryForBS());
			$this->setLoadBS();
			$this->getLoadBS()->loadBootStrap($this);
		}
		
		function loadCSSFiles() {
			$this->getLoadBS()->printCSSFiles("CSS", $this->getLoadBS()->getBootstrap()->getCSSFieleArray(), $this->getBSDirect());
		}
		
		function loadJSFiles() {
			$this->getLoadBS()->printJSFiles("JS", $this->getLoadBS()->getBootstrap()->getJSFieleArray(), $this->getBSDirect());
		}
		
		function setLoadBS() {
			include_once($this->getBSDirect()."/index.php");
			$this->loadBS = new LoadBootStrap();
		}
		
		function getLoadBS() {
			return $this->loadBS;
		}
		
	}
?>