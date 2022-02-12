<?php

namespace App;

use App\MovementManagement;

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
        $sequence = $this->sequenceMovements;
        $world->generateObstacles($roverX,$roverY);
        $movementObject = new MovementManagement;
        print "Starting Rover Movement\n";
        for ($i=0; $i < count($sequence) ; $i++) { 
            //print "Moving {".$sequence[$i]."}\n";
            $movementObject->selectMovement($this->direction,$sequence[$i],$roverX,$roverY);
        //bucle por la longitud de la cantidad de movimientos
        //call function and send XY del rover actual + direccion del movimiento (NWSE) + el movimiento de este paso F,L,R
        //retorna nueva posicion que se le pasa a la siguiente funcion para comprovar la posibilidad del movimiento
        $world->checkObstacle($roverX,$roverY);
        //if previous check returns false the loop continues to execute the next movement
        }
        //$this->sequenceMovements;

        //$this->direction;
        //$worldcoordX = $world->returnCoordX();
        //$worldcoordY = $world->returnCoordY();
    }

}


?>