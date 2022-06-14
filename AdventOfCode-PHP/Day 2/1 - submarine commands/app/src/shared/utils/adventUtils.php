<?php

    function getArray($filename)
    {
        //open file
        $inputFile = fopen($filename, "r") or die("Unable to open file!");

        // $array = [171, 173, 174, 163, 161, 157, 156, 154, 152, 156];
        $fileArray[] = null;

        //read line by line
        while (($line = fgets($inputFile)) != false) {
            $fileArray[] = $line;
        }
        return $fileArray;
    }
    function get_array_deliminited_by_space($filename){
        //open file
        $inputFile = fopen($filename, "r") or die("Unable to open file!");

        $fileArray[] = null;
        while(($line=fgets($inputFile))!= false){
            $fileArray[] = explode(' ', $line);
        }
        return $fileArray;
    }
    function get_move_command_array_from_filename($filename){
        $inputArray = get_array_deliminited_by_space($filename);

        $arrayOfCommands[] = null;
    
        foreach($inputArray as $mov){
            $arrayOfCommands[] = new MoveCommand($mov[0], $mov[1]);
        }
        return $arrayOfCommands;
    }
    function countHowManyNextIsLargerInList($depths)
    {
        $incrCounter = 0;
        $lastDepth = null;
        foreach ($depths as $depth) {
            if (is_null($lastDepth)) {
                //no previous entry, assume start
                $lastDepth = (int)$depth;
            } elseif ((int)$lastDepth < (int)$depth) {
                //assume increase
                $incrCounter++;
            }
            $lastDepth = (int)$depth;
        }
        //count is off by 1, because at the start it was null < start which was true
        return $incrCounter - 1;
    }
?>