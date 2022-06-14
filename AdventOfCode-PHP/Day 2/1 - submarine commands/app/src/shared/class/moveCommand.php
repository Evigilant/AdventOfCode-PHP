<?php
    class MoveCommand
    {
        //turn into an interface for movement commands
        public $direction;
        public $distance;

        function __construct($dir, $dist){
            $this->direction = $dir;
            $this->distance= $dist;
        }
    }
?>