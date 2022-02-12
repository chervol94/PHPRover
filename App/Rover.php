<?php

namespace App;

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

    public function move(World $world){
        $roverX = $this->roverPosX;
        $roverY = $this->roverPosY;
        $world->generateObstacles($roverX,$roverY);
        $world->checkObstacle(6,1);
        //$this->sequenceMovements;

        //$this->direction;
        //$worldcoordX = $world->returnCoordX();
        //$worldcoordY = $world->returnCoordY();
    }

}


?>