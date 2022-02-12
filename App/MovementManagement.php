<?php

namespace App;

use InvalidArgumentException;

//TODO extend Class Rover
class MovementManagement{

    private $directionCases = [
        "UP" => "EL,NF,WR",
        "DOWN" => "ER,WL,SF",
        "RIGHT" => "EF,NR,SL",
        "LEFT" => "NL,SR,WF"
    ];


    function selectMovement(string $direction, string $movementstep, int $roverpositionX, int $roverpositionY){
        $combination = trim($direction.$movementstep);
        print "..Moving ".$combination." from current rover position (".$roverpositionX." ".$roverpositionY.")\n";
        foreach ($this->directionCases as $key => $value) {
            $subarray = explode(",",$value);
            //print "Array Search of ". $combination." in ".$key." for ".$value."\n";
            //var_dump($subarray);
            if(array_search($combination,$subarray)!== false){
                $option = $key;
            }
        }
        print "The direction of movement is ".$option."\n";
        
        
        
        //search in $directionCases the element of addition, after finding it, return INDEX of that array

        switch ($option) {
            case 'UP':
                $this->moveAxisUp();
            break;
            case 'DOWN':
                $this->moveAxisDown();
            break;
            case 'RIGHT':
                $this->moveAxisRight();
            break;
            case 'LEFT':
                $this->moveAxisLeft();
            break;
            
            default:
                throw new InvalidArgumentException("Something Went Wrong");
            break;
        }

    }

    //Function that moves (X,Y+1) corresponding to -> EL, NF, WR
    private function moveAxisUp(){

    }

    //Function that moves (X,Y-1) corresponding to -> ER, WL, SF
    private function moveAxisDown(){

    }

    //Function that moves (X+1,Y) corresponding to -> EF, NR, SL (EastForward, NorthRight, SouthLeft)
    private function moveAxisRight(){

    }
    //Function that moves (X-1,Y) corresponding to -> NL, SR, WF
    private function moveAxisLeft(){

    }
}







?>