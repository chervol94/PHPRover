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
        print "Rover has landed in Mars!!\n";
        for ($i=0; $i < count($sequence) ; $i++) { 
            //print "Moving {".$sequence[$i]."}\n";
            $nextmovement = $movementObject->selectMovement($this->direction,$sequence[$i],$roverX,$roverY);
            print "..Scanning surface for obstacles in (".$nextmovement[0]." ".$nextmovement[1].")\n";
            //print "Moving to (".$roverX." ".$roverY.")\n";
        //bucle por la longitud de la cantidad de movimientos
        //call function and send XY del rover actual + direccion del movimiento (NWSE) + el movimiento de este paso F,L,R
        //retorna nueva posicion que se le pasa a la siguiente funcion para comprovar la posibilidad del movimiento
        $obstacleFound = $world->checkObstacle($nextmovement[0],$nextmovement[1]);
        //if previous check returns false the loop continues to execute the next movement
        //print "Result of flag:".$obstacleFound."\n";
        if(!$obstacleFound){
            $roverX = $nextmovement[0];
            $roverY = $nextmovement[1];
            print "[Obstacle not Found] - Rover moved to (".$roverX." ".$roverY.")\n";
        }else{
            print " - Position will remain at (".$roverX." ".$roverY.")\n";
            break;
        }
        
        }
        //$this->sequenceMovements;

        //$this->direction;
        //$worldcoordX = $world->returnCoordX();
        //$worldcoordY = $world->returnCoordY();
    }

}


?>