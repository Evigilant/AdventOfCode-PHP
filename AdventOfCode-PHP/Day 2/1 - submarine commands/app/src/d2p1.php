<?php
    require __DIR__ . '/shared/utils/adventUtils.php';
    require __DIR__ . '/shared/class/moveCommand.php';
    require __DIR__ . '/shared/class/submarine.php';

    $sub = new Submarine();

    $commandList = get_move_command_array_from_filename("input.txt");
    foreach($commandList as $command){
        if($command !== null){
            print_r($command);
            $sub->handle_movement($command);
        }
    }
    $finalHoriz =$sub->get_current_horizontal();
    $finalDepth = $sub->get_current_depth();
    $finalInt = $finalHoriz * $finalDepth;

    echo "$finalHoriz <br/>";
    echo "$finalDepth <br/>";
    echo "$finalInt <br/>";
?>