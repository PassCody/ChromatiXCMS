<?php
	class BootStrap {
		
		private $cssi;
		private $jsi;
		private $cssFieleArray;
		private $jsFieleArray;
		
		function loadFileGeter($param, $direct) {
			switch ($param) {
				case "CSS":
					$this->getFileList($direct."/".strtolower($param), $param);
				break;
				case "JS":
					$this->getFileList($direct."/".strtolower($param), $param);
				break;
			}
		}
		
		function getFileList($dir, $param) {
			$dir = $dir;
			$files	= scandir($dir, 1);
			sort($files);
			foreach ($files as &$value) {
				if (str_ends_with($value,".".strtolower($param))) {
					switch ($param) {
						case "CSS":
							$this->setCSSFieleArray($value, $this->getCSSI());
							$this->setCSSI($this->getCSSI()+1);
						break;
						case "JS":
							$this->setJSFieleArray($value, $this->getJSI());
							$this->setJSI($this->getJSI()+1);
						break;
					}
				}
			}
		}
		
		function printFiles($param, $files, $direct) {
			foreach ($files as &$value) {
				if (str_ends_with($value,".".strtolower($param))) {
					switch ($param) {
						case "CSS":
							$this->printCSSFiles($direct."/css/".$value);
						break;
						case "JS":
							$this->printJSFiles($direct."/js/".$value);
						break;
					}
				}
			}
		}
		
		function printCSSFiles ($file) {
			echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"".$file."\" />\n\t\t");
		}
		
		function printJSFiles ($file) {
			echo("<script async=\"\" src=\"".$file."\"></script>\n\t\t");
		}

		function getCSSFieleArray(){
			return $this->cssFieleArray;
		}

		function setCSSFieleArray($fiele, $i) {
			$this->cssFieleArray[$i] = $fiele;
		}

		function getJSFieleArray(){
			return $this->jsFieleArray;
		}

		function setJSFieleArray($fiele, $i) {
			$this->jsFieleArray[$i] = $fiele;
		}

		function getCSSI(){
			return $this->cssi;
		}

		function setCSSI($cssi) {
			$this->cssi = $cssi;
		}

		function getJSI(){
			return $this->jsi;
		}

		function setJSI($jsi) {
			$this->jsi = $jsi;
		}
	}
?>