<?php

require 'vendor/autoload.php';


use App\InputManagement;
use App\Rover;

$inputChecker = new InputManagement;

echo "Please provide world size (e.g 100 100)\n";
$worldSize = fgets(STDIN);
$worldObject = $inputChecker->worldcheck($worldSize);


echo "Please input the position of the Rover (X Y)\n";
$roverPosition = fgets(STDIN);
$roverObject = $inputChecker->roverPositionCheck($roverPosition,$worldObject);


echo "Please input the direction the Rover is facing (N/S/E/W)\n";
$roverFacing = fgets(STDIN);
$inputChecker->directionCheck($roverFacing,$roverObject);


echo "Please input the sequence of commands for the rover, Forward (F), Left (L) or Right (R) e.g (FLLR)\n";
$roverSequence = fgets(STDIN);
$inputChecker->sequenceCheck($roverSequence,$roverObject);

echo "Rover Data:\n";
var_dump($roverObject->returnValues());
echo "World Data\n";
var_dump($worldObject->returnValues());

$worldObject->generateObstacles();
$worldObject->checkObstacle(6,1);

//$movementObject = new Rover($directionTravel,);

/*echo "Your world size is\n";
echo $worldSize;
echo $roverPosition;
echo $roverFacing;
echo $roverSequency;*/
$outputData = [];
/*for($i = 0; $i < 1; ++$i) {
    echo "Provide Rover{$i} Data \n";
    $roverInput = fgets(STDIN);
    $movementInput = fgets(STDIN);

    $position = Input::plateauInputFromString($plateauInput);
    $plateau  = new Plateau($position);

    $input = Input::roverInputFromString($roverInput);
    $rover = new Rover($input['position'], $input['direction']);
    $action = new Action($rover);
    $outputData[] = $action->act(Input::movementCommandsFromString($movementInput));
}*/

echo "Result\n";

foreach ($outputData as $result) {
    echo $result . "\n";
}

