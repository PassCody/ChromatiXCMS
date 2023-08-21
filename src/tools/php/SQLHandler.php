<?php
    CLASS SQLHandler{
        private $path;
        FUNCTION main($super) {
            $this->path = $super->getPath();
            print_r($this->path);
        }
    }
?>