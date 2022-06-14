<?php

    function get_array($filename)
    {
        //open file
        $inputFile = fopen($filename, "r") or die("Unable to open file!");

        $fileArray= array();
        while(!feof($inputFile)){
            $textPerLine=fgets($inputFile);
            $fileArray[]=$textPerLine;
        }
        fclose($inputFile);

        // echo "get_array:";
        // print_r($fileArray);

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
    function find_max_common_element_in_col($array, $column){
        $zeroCount = 0;
        $oneCount = 0;

        $evalArray = array();
        $evalArray["0"] = $zeroCount;
        $evalArray["1"] = $oneCount;

        for($x = 0; $x < count($array); $x++){
            if((int)$array[$x][$column] == 0){
                $zeroCount++;
                $evalArray["0"] = $zeroCount;
            }
            elseif((int)$array[$x][$column] == 1){
                $oneCount++;
                $evalArray["1"] = $oneCount;
            }
        } 
        return array_search(max($evalArray), $evalArray);
    }
    function find_min_common_element_in_col($array, $column){
        $zeroCount = 0;
        $oneCount = 0;

        $evalArray = array();
        $evalArray["0"] = $zeroCount;
        $evalArray["1"] = $oneCount;

        for($x = 0; $x < count($array); $x++){
            if((int)$array[$x][$column] == 0){
                $zeroCount++;
                $evalArray["0"] = $zeroCount;
            }
            elseif((int)$array[$x][$column] == 1){
                $oneCount++;
                $evalArray["1"] = $oneCount;
            }
        } 
        return array_search(min($evalArray), $evalArray);
    }
?>