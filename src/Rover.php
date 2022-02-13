<?php

namespace App;

use App\MovementManagement;
//Class that stores all the values related with the rover and also operates the movement
class Rover{

    private $direction;
    private $roverPosX;
    private $roverPosY;
    private $sequenceMovements;

    public function __construct( int $posX, int $posY)
    {
        $this->roverPosX = $posX;
        $this->roverPosY = $posY;
    }
    public function setDirection(string $direction){
        $this->direction = $direction;
    }
    public function setMovements(array $movements){
        $this->sequenceMovements = $movements;
    }

    public function returnValues()
    {
        return  [
            'positionX' => $this->roverPosX,
            'positionY' => $this->roverPosY,
            'direction' => $this->direction,
            'movements' => $this->sequenceMovements
        ];
    }

    //Function that executes the movement based on the sequence given
    public function move(World $world){
        $roverX = $this->roverPosX;
        $roverY = $this->roverPosY;
        $sequence = $this->sequenceMovements;
        $direction = $this->direction;
        $world->generateObstacles($roverX,$roverY);
        $movementObject = new MovementManagement;
        print "Rover has landed in Mars!!\n";
        for ($i=0; $i < count($sequence) ; $i++) { 
            //print "Moving {".$sequence[$i]."}\n";
            $nextmovement = $movementObject->selectMovement($direction,$sequence[$i],$roverX,$roverY);
            print "..Scanning surface for obstacles in (".$nextmovement[0]." ".$nextmovement[1].")\n";
            //print "Moving to (".$roverX." ".$roverY.")\n";
            $obstacleFound = $world->checkObstacle($nextmovement[0],$nextmovement[1]);
            if(!$obstacleFound){
                $roverX = $nextmovement[0];
                $roverY = $nextmovement[1];
                print "[Obstacle not Found] - Rover moved to (".$roverX." ".$roverY.")\n";
            }else{
                print " - Position will remain at (".$roverX." ".$roverY.")\n";
                break;
            }
        }
    }

}


?>