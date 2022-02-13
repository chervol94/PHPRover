<?php

namespace Tests\Unit;

use App\InputManagement;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertIsArray;
use function PHPUnit\Framework\assertTrue;

class InputTest extends TestCase{

    

    //public function test_that_it_isChar_method_returns_bool(){
/*
        //Given that we have an object InputManagement
        $inputManagement = new InputManagement();
        //When we call the function 
        $result = $inputManagement::isChar("a");
        $inputManagement->
        //it returns if it is a char
        $this->assertTrue($result);
        */
   // }

    /*public function test_that_an_obstacle_is_detected(){
        //Given that we have an object world with a size
        $a = new World(6,6);
        //That has an array obstacles to compare against
        $reflection = new ReflectionClass($a);
        $property = $reflection->getProperty('obstacles');
        $property->setAccessible(true);
        $property->setValue($a, ["1 1","1 2"]);
        //when we call the function
        //Then we have a true result
        assertEquals(true,$a->checkObstacle(1,2));    
    }
    
    public function test_that_obstacles_are_generated(){
        //Given that we have and object world with a size
        $a = new World(6,6);
        //When we generate obstacles avoiding the position of the rover
        $a->generateObstacles(0,0);
        //Then we obtain an Array full of positions
        $reflection = new ReflectionClass($a);
        $property = $reflection->getProperty('obstacles');
        $property->setAccessible(true);
        assertIsArray($property->getValue($a));
    }*/
}

?>