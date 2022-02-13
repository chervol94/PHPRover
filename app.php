<?php

require 'vendor/autoload.php';

/*
require_once("src/Rover.php");
require_once("src/InputManagement.php");
require_once("src/World.php");
require_once("src/MovementManagement.php");
*/

use App\InputManagement;
use App\Rover;

$inputChecker = new InputManagement;

echo "Please provide world size (e.g 100 100)\n";
$worldSize = fgets(STDIN);
$worldObject = $inputChecker->worldcheck($worldSize);


echo "Please input the position of the Rover (X Y). Keep in mind that the world starts at (0 0)\n";
$roverPosition = fgets(STDIN);
$roverObject = $inputChecker->roverPositionCheck($roverPosition,$worldObject);


echo "Please input the direction the Rover is facing (N/S/E/W)\n";
$roverFacing = fgets(STDIN);
$inputChecker->directionCheck($roverFacing,$roverObject);


echo "Please input the sequence of commands for the rover, Forward (F), Left (L) or Right (R) e.g (FLLR)\n";
$roverSequence = fgets(STDIN);
$inputChecker->sequenceCheck($roverSequence,$roverObject);

//echo "Rover Data:\n";
//var_dump($roverObject->returnValues());
//echo "World Data\n";
//var_dump($worldObject->returnValues());

$roverObject->move($worldObject);

print "Movement completed, Rover shuting down..\n";

print "Do you wish to view the random obstacle placement for this execution? (Y/N) (Recomended use in small worlds)\n";
$boolQuestion = fgets(STDIN);
$inputChecker->booleanCheck($boolQuestion,$worldObject);

?>



