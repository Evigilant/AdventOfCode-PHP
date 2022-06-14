<?php
    require __DIR__ . '/shared/utils/adventUtils.php';
    require __DIR__ . '/shared/class/moveCommand.php';
    require __DIR__ . '/shared/class/submarine.php';

    $sub = new Submarine();

    $commandList = get_move_command_array_from_filename("input.txt");
    foreach($commandList as $command){
        if($command != null){
            $sub->handle_movement($command);
        }
    }
    $finalHoriz =$sub->horizontal;
    $finalDepth = $sub->depth;
    $finalAim = $sub->aim;

    $finalInt = $finalHoriz * $finalDepth;

    echo "horiz: $finalHoriz <br/>";
    echo "depth: $finalDepth <br/>";
    echo "aim: $finalAim <br/>";
    echo "horiz * depth: $finalInt <br/>";
?>