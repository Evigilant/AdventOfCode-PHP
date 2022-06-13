<?php

    class Submarine{
        //properties
        public $horizontal;
        public $depth;

        //methods
        function set_horizontal($newHorizontal){
            //handle +/-
            $this->horizontal = $newHorizontal;
        }
        function set_depth($newDepth){
            //handle +/-
            $this->horizontal = $newDepth;
        }

        function get_current_horizontal() {
            return $this->horizontal;
        }
        
        function get_current_depth() {
            return $this->depth;
        }
    }

?>