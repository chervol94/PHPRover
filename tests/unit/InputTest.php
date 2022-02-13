<?php

namespace Tests\Unit;

use App\Rover;
use App\InputManagement;
use App\World;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertIsArray;
use function PHPUnit\Framework\assertObjectEquals;
use function PHPUnit\Framework\assertTrue;

class InputTest extends TestCase{

    public function test_that_worldCheck_method_is_working(){
        //Given that we have a object of a class that manages the inputs
        $a = new InputManagement();
        //When we send a string that is accepted
        $value = $a->worldCheck("6 6");
        //Then it returns a world object with those values
        $w = new World(6,6);
        assertEquals($w,$value);
    }
    /*public function test_that_worldCheck_method_returns_exception(){
        //Given that we have a object of a class that manages the inputs
        $a = new InputManagement();
        //When we send a string that is not accepted
        $value = $a->worldCheck("A 6");
        //Then it returns a InvalidArgumentException
        $this->expectException(InvalidArgumentException::class);
    }*/

    public function test_that_roverPositionCheck_method_is_working(){
        //Given that we have an object of input management and an object World
        $a = new InputManagement();
        $w = new World(6,6); 
        //When we input the starting position of the rover
        $value = $a->roverPositionCheck("2 2",$w);
        $r = new Rover(2,2);
        assertEquals($r,$value);
        //Then it returns a Rover object with the position
    }
}

?>