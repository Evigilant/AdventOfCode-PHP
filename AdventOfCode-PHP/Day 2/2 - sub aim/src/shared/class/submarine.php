<?php

    class Submarine{
        //properties
        public $horizontal;
        public $depth;
        public $aim;

        //methods
        function handle_movement(MoveCommand $moveCommand){

            if(strcasecmp("forward", $moveCommand->direction)==0){

                $this->horizontal = $this->horizontal + $moveCommand->distance;
                if($this->aim > 0) {
                    $this->depth = $this->depth + ($moveCommand->distance * $this->aim);
                }

            } elseif(strcasecmp("down", $moveCommand->direction) == 0){
                
                // $this->depth = $this->depth + $moveCommand->distance;
                $this->aim = $this->aim + $moveCommand->distance;

            } else{

                // $this->depth = $this->depth - $moveCommand->distance;
                $this->aim = $this->aim - $moveCommand->distance;
            }
        }

        function __construct()
        {
            $horizontal = 0;
            $depth = 0;
            $aim = 0;
        }
    }

?>