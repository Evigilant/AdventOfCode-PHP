<?php

    class Submarine{
        //properties
        public $horizontal;
        public $depth;

        //methods
        function get_current_horizontal() {
            return $this->horizontal;
        }
        
        function get_current_depth() {
            return $this->depth;
        }

        function handle_movement(MoveCommand $moveCommand){
            if(strcasecmp("forward", $moveCommand->direction)==0){
                $this->horizontal = $this->get_current_horizontal() + $moveCommand->distance;
            } elseif(strcasecmp("down", $moveCommand->direction) == 0){
                $this->depth = $this->get_current_depth()+$moveCommand->distance;
            } else{
                $this->depth = $this->get_current_depth()-$moveCommand->distance;
            }
        }

        function __construct()
        {
            $horizontal = 0;
            $depth = 0;
        }
    }

?>