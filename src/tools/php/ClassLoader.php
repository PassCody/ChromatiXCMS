<?php
    FINAL CLASS ClassLoader {
        private $path, $fileArray, $newFileArray = Array(), $classVriableName = Array(), $className = Array(), $object = Array();

        FUNCTION printPath($init) {
            $this->path = $init."./src/tools/php/";
            $this->getFiles();
            $this->createObjects();
        }

        FUNCTION createObjects() {
            foreach($this->newFileArray as $key => $value) {
                include_once("$this->path$value");
                $this->object[$this->classVriableName[$key]] = new $this->className[$key]();
            }
        }

        

        FUNCTION getFiles() {
            $this->fileArray = scandir($this->path);
            foreach ($this->fileArray as &$value) {
                if (str_contains($value, ".php") && $value !== "ClassLoader.php") {
                    $this->newFileArray = array_merge($this->newFileArray, Array($value));
                    $className = explode(".", $value);
                    $helper = $className[0];
                    $this->className = array_merge($this->className, Array($helper));
                }
            }
            $this->buildClassVariableNames();
        }

        FUNCTION buildClassVariableNames() {
            $chars = Array();;
            foreach ($this->newFileArray as &$valueI) {
                $chars = preg_split('//', $valueI, -1, PREG_SPLIT_NO_EMPTY);
                $helper = "";
                foreach ($chars as $key => $valueII) {
                    if (ctype_upper($valueII)) {
                        $helper .= (strtolower($valueII));
                    }
                }
                $this->classVriableName = array_merge($this->classVriableName, Array($helper));
            }
        }

        FUNCTION getPath() {
            return $this->path;
        }
        FUNCTION getFileArray() {
            return $this->fileArray;
        }
        FUNCTION getNewFileArray() {
            return $this->newFileArray;
        }
        FUNCTION getClassVriableName() {
            return $this->classVriableName;
        }
        FUNCTION getClassName() {
            return $this->className;
        }

        FUNCTION getObjects() {
            return $this->object;
        }
    }
?>