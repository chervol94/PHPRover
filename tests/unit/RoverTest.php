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

class RoverTest extends TestCase{

    public function test_that_move_method_moves_correctly(){
        //Given that we have the rover and the world with position and world size
        $r = new Rover(0,0);
        $w = new World(10,10);
        //That we also have we a set of directions and heading
        $r->setDirection("N");
        $r->setMovements(["F","F","R","R","R","F","L"]);
        //When we move with the obstacles deactivated the final position is the one expected
        $r->move($w,true);
        $value = $r->getFinalPosition();
        assertEquals([2,3],$value);
    }
}

?>