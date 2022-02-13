<?php

namespace Tests\Unit;

use App\World;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function PHPUnit\Framework\assertArrayHasKey;
use function PHPUnit\Framework\assertEquals;

class WorldTest extends TestCase{

    public function test_that_an_obstacle_is_detected(){
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
    public function test_that_an_obstacle_is_not_detected(){
        //Given that we have an object world with a size
        $a = new World(6,6);
        //That has an array obstacles to compare against
        $reflection = new ReflectionClass($a);
        $property = $reflection->getProperty('obstacles');
        $property->setAccessible(true);
        $property->setValue($a, ["1 1","1 2"]);
        //when we call the function
        //Then we have a false result
        assertEquals(false,$a->checkObstacle(1,0));    
    }
    public function test_that_an_obstacle_is_not_detected_but_boundary_is(){
        //Given that we have an object world with a size
        $a = new World(6,6);
        //That has an array obstacles to compare against
        $reflection = new ReflectionClass($a);
        $property = $reflection->getProperty('obstacles');
        $property->setAccessible(true);
        $property->setValue($a, ["1 1","1 2"]);
        //when we call the function to check if we detect an obstacle
        //Then we have a positive result due to being out of bounds
        assertEquals(true,$a->checkObstacle(6,0));    
    }

    public function test_that_obstacles_are_generated(){
        //Given that we have and object world with a size
        $a = new World(6,6);
        //When we generate obstacles avoiding the position of the rover
        $a->generateObstacles(0,0);
        //Then we obtain an Array and its full of positions
        $reflection = new ReflectionClass($a);
        $property = $reflection->getProperty('obstacles');
        $property->setAccessible(true);
        assertArrayHasKey(10,$property->getValue($a)); 
    }
    
}

?>