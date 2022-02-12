<?php

namespace App;

class World{

    private $coordX;
    private $coordY;
    private $obstacles;

    public function __construct(int $x, int $y){
        $this->coordX = $x;
        $this->coordY = $y;
    }

    public function returnCoordX(){
        return $this->coordX;
    }
    public function returnCoordY(){
        return $this->coordY;
    }

    public function returnValues(){
        return [
            'size X' => $this->coordX,
            'size Y' => $this->coordY
        ];
        
    }
    //Function used to generate the obstacles in the world, using the size provided by the user, in 1/3 of the map randomly 
    //and avoiding the position of the rover
    public function generateObstacles(int $roverX,int $roverY){
        $maxsizeX = $this->coordX;
        $maxsizeY = $this->coordY;
        $totalworld = $maxsizeX*$maxsizeY;
        $quantityObstacles = floor($totalworld/3);
        $valueObstacles = [];
        for ($i=0; $i<$quantityObstacles; $i++) { 
            $numX = random_int(0,$maxsizeX-1);
            $numY = random_int(0,$maxsizeY-1);
            //print "Position ({$numX} {$numY})";
            if($numX == $roverX && $numY == $roverY){
                //TODO Improve IF
                //print "1 1 Reached";
            }else{
                $valueObstacles[] = "{$numX} {$numY}";
            }
        }
        $this->obstacles = $valueObstacles;
        var_dump($this->obstacles);
    }
    //Function used to check if the position provided has any obstacle present/reaches boundaries
    public function checkObstacle(int $posX, int $posY){
        $maxsizeX = $this->coordX;
        $maxsizeY = $this->coordY;
        $obstacleArray = $this->obstacles;
        foreach ($obstacleArray as $value){
            $coordinates = explode(' ', trim($value));
            if ($coordinates[0] == $posX  && $coordinates[1] == $posY ){
                echo "Obstacle found in position ({$posX} {$posY})";
                //return true
            }
        }
        //Given that the position of the grid in a 6x6 is from 0 to 5, if any movement reaches or surpases the max, 6, the rover will be out of bounds.
        if($posX >= $maxsizeX || $posY >= $maxsizeY){
            echo "World boundary reached";
            //return true;
        }
        //return false;
    }

}

?>