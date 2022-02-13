<?php

namespace App;

use InvalidArgumentException;

//TODO extend Class Rover
//Class used to manage the movements in the XY Axis
class MovementManagement{

    //Array that groups all the cardinal directions with the equivalent movement in the XY Axis
    private $directionCases = [
        "UP" => "EL,NF,WR",
        "DOWN" => "ER,WL,SF",
        "RIGHT" => "EF,NR,SL",
        "LEFT" => "NL,SR,WF"
    ];

    //Function that uses the previously defined array to translate cardinal directions into real movements of the XY Axis
    function selectMovement(string $direction, string $movementstep, int $roverpositionX, int $roverpositionY){
        $combination = trim($direction.$movementstep);
        print "..Rover received orders to move ".$movementstep." heading ".$direction." from current position (".$roverpositionX." ".$roverpositionY.")\n";
        foreach ($this->directionCases as $key => $value) {
            $subarray = explode(",",$value);
            if(array_search($combination,$subarray)!== false){
                $option = $key;
            }
        }

        switch ($option) {
            case 'UP': //Option that moves (X,Y+1) corresponding to -> EL, NF, WR (EastLeft, NorthFront, WestRight)
                $roverpositionY++;
                return [$roverpositionX,$roverpositionY];
            break;
            case 'DOWN'://Option that moves (X,Y-1) corresponding to -> ER, WL, SF (EastForward, WestLeft, SouthForward)
                $roverpositionY--;
                return [$roverpositionX,$roverpositionY];
            break;
            case 'RIGHT': //Option that moves (X+1,Y) corresponding to -> EF, NR, SL (EastForward, NorthRight, SouthLeft)
                $roverpositionX++;
                return [$roverpositionX,$roverpositionY];
            break;
            case 'LEFT'://Option that moves (X-1,Y) corresponding to -> NL, SR, WF (NorthLeft, SouthRight, WestForward)
                $roverpositionX--;
                return [$roverpositionX,$roverpositionY];
            break;
            default:
                throw new InvalidArgumentException("Something Went Wrong");
            break;
        }

    }

}

?>