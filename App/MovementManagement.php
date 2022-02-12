<?php

namespace App;

use InvalidArgumentException;

//TODO extend Class Rover
class MovementManagement{

    private $directionCases = [
        "UP" => "EF,NR,SL",
        "DOWN" => "NL,SR,WF",
        "RIGHT" => "EL,NF,WR",
        "LEFT" => "ER,Wl,SF"
    ];


    function selectMovement(string $direction, string $movementstep, int $roverpositionX, int $roverpositionY){
        //addition direction+string


        switch () {
            case 'UP':
                moveAxisUp();
            break;

            case 'DOWN':
                moveAxisDown();
            break;

            case 'RIGHT':
                moveAxisRight();
            break;
            case 'LEFT':
                moveAxisLeft();
            break;
            
            default:
                throw new InvalidArgumentException("Something Went Wrong");
            break;
        }

    }




    //Function that moves (X+1,Y) corresponding to -> EF, NR, SL (EastForward, NorthRight, SouthLeft)
    private function moveAxisUp(){

    }
    //Function that moves (X-1,Y) corresponding to -> NL, SR, WF
    private function moveAxisDown(){

    }
    //Function that moves (X,Y+1) corresponding to -> EL, NF, WR
    private function moveAxisRight(){

    }
    //Function that moves (X,Y-1) corresponding to -> ER, WL, SF
    private function moveAxisLeft(){

    }
}







?>