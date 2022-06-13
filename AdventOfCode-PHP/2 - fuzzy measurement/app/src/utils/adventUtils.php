<?php

    function getArray($filename)
    {
        //open file
        $inputFile = fopen($filename, "r") or die("Unable to open file!");

        // $array = [171, 173, 174, 163, 161, 157, 156, 154, 152, 156];
        $fileArray[] = null;

        //read line by line
        while (($line = fgets($inputFile)) != false) {
            $fileArray[] = (int)$line;
        }
        return $fileArray;
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