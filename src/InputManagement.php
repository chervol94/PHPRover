<?php

namespace App;


use InvalidArgumentException;
use App\World;

//Class used to manage the inputs given by the user
class InputManagement{

    // Function used to control the parameter of the world
    public static function worldCheck(string $input){
        $inputArray = self::toArray($input);

        if (count($inputArray) !== 2 || !self::IsDigit($inputArray)) {
            throw new InvalidArgumentException ('Expected input should be two int (X Y)');
        }
        if($inputArray[0]<=5 || $inputArray[1]<=5 ){
            throw new InvalidArgumentException('Please provide a world size bigger than 5x5');
        }

        return new World(intval($inputArray[0]),intval($inputArray[1]));
    }

    //Function used to control the parameters of the placement of the rover, restricting the position inside the world.
    public static function roverPositionCheck(string $input, World $world){
        $inputArray = self::toArray($input);

        $worldcoordX = $world->returnCoordX();
        $worldcoordY = $world->returnCoordY();

        if (count($inputArray) !== 2 || !self::IsDigit($inputArray)) {
            throw new InvalidArgumentException ('Expected input should be two int (X Y)');
        }

        if($inputArray[0]<0 || $inputArray[1]<0|| intval($worldcoordX-1)<$inputArray[0] || intval($worldcoordY-1)<$inputArray[1]){
            throw new InvalidArgumentException('Please place the rover within boundries, from 0 0 to world size defined');
        }

        return new Rover(intval($inputArray[0]),intval($inputArray[1]));
    }

    public static function directionCheck(string $inputRaw,Rover $rover){
        $input = trim($inputRaw);
        /*echo strlen(trim($input));
        echo self::isChar($input);
        echo self::sameChar($input);*/
        if (strlen($input) !== 1 || !self::isChar($input) || !self::sameChar($input)) {
            throw new InvalidArgumentException ('Expected input should be a char (N,S,E,W)');
        }
        $rover->setDirection($input);
    }

    public static function sequenceCheck(string $input, Rover $rover){
        $sequence = str_split(trim($input),$split_length = 1);
        self::identicalValue($sequence);
        $rover->setMovements($sequence);
    }

    private static function identicalValue(array $sequence){
        $moveArray = ["F","L","R"];
        $containsAllValues = !array_diff($sequence, $moveArray);
        //var_dump($containsAllValues);
        if(!$containsAllValues){
            throw new InvalidArgumentException("A unvalid command was given, please use F/L/R");
        }  
    }
     /**
     * Function used to manage if the input given is a numeral
     * @param string $input
     * @return bool
     */
    private static function isDigit(array $inputArray)
    {
        return (ctype_digit($inputArray[0]) && ctype_digit($inputArray[1]));
    }

    //Function used to assure that the input is a character
    /**
     * @param string $input
     * @return bool
     */
    private static function isChar(string $input)
    {
        return (ctype_alpha($input));
    }

    //Function used to assure that the characters used are the ones supported
    /**
     * @param string $input
     * @return bool
     */
    private static function sameChar($input){
        $charArray = ["N","S","E","W"];
        return in_array($input,$charArray);
    }

    //Function used to transform the string into an array, to be able to manage it and operate with it more easily
    /**
     * @param string $input
     * @return array
     */
    private static function toArray(string $input)
    {
       return explode(' ', trim($input));
    }


}

?>