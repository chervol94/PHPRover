<?php

namespace Tests\Unit;

use App\MovementManagement;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function PHPUnit\Framework\assertEquals;

class MovementTest extends TestCase{

    public function test_that_movement_is_done_correctly_UP(){
         //Given that we have a class of movement 
        $a = new MovementManagement();
        //When we call the movement function providing Heading,Movement Step, Rover Pos X and Rover Pos Y
        $movementValues = $a->selectMovement("N","F","2","2");
        //Then we obtain the new position to move UP in the XY Axis
        assertEquals([2,3],$movementValues);

    }
    public function test_that_movement_is_done_correctly_DOWN(){
        //Given that we have a class of movement 
       $a = new MovementManagement();
       //When we call the movement function providing Heading,Movement Step, Rover Pos X and Rover Pos Y
       $movementValues = $a->selectMovement("E","R","3","3");
       //Then we obtain the new position to move DOWN in the XY Axis
       assertEquals([3,2],$movementValues);

    }
    public function test_that_movement_is_done_correctly_LEFT(){
        //Given that we have a class of movement 
        $a = new MovementManagement();
        //When we call the movement function providing Heading,Movement Step, Rover Pos X and Rover Pos Y
        $movementValues = $a->selectMovement("W","F","4","4");
        //Then we obtain the new position to move LEFT in the XY Axis
        assertEquals([3,4],$movementValues);
    }
    public function test_that_movement_is_done_correctly_RIGHT(){
        //Given that we have a class of movement 
        $a = new MovementManagement();
        //When we call the movement function providing Heading,Movement Step, Rover Pos X and Rover Pos Y
        $movementValues = $a->selectMovement("S","L","5","5");
        //Then we obtain the new position to move RIGHT in the XY Axis
        assertEquals([6,5],$movementValues);
    }
   

}

?>