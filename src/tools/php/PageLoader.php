<?php
    CLASS PageLoader{
        private $page, $path = "Pages";
        FUNCTION main($super) {
            $this->path = $super->getPath().$this->path;
            include_once($this->path."/index.php");
        }
    }
?>