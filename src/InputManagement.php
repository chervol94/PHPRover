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
            throw new InvalidArgumentException ('Input provided should be two int (X Y)');
        }

        if($inputArray[0]<0 || $inputArray[1]<0|| intval($worldcoordX-1)<$inputArray[0] || intval($worldcoordY-1)<$inputArray[1]){
            throw new InvalidArgumentException('Please place the rover within boundries, e.g(World of 6x6 From 0 0 to 5 5)');
        }

        return new Rover(intval($inputArray[0]),intval($inputArray[1]));
    }

    /**
     * Function used filter the values of the rover direction
     * @param string $input
     * @return void
     */
    public static function directionCheck(string $inputRaw,Rover $rover){
        $input = trim($inputRaw);
        /*echo strlen(trim($input));
        echo self::isChar($input);
        echo self::sameChar($input);*/
        if (strlen($input) !== 1 || !self::isChar($input) || !self::sameChar($input)) {
            throw new InvalidArgumentException ('Input provided should be a char (N/S/E/W)');
        }
        $rover->setDirection($input);
    }

    /**
     * Function used filter the values of the movement sequence
     * @param string $input
     * @param object $rover
     * @return void
     */
    public static function sequenceCheck(string $input, Rover $rover){
        $sequence = str_split(trim($input),$split_length = 1);
        self::identicalValue($sequence);
        if(count($sequence)>15){
            throw new InvalidArgumentException("Input provided should not exceed 15 commands");
        }else{
            $rover->setMovements($sequence);
        }
    }

    /**
     * Function used filter the input of the (Y/N) question made at the end of the execution
     * @param string $input
     * @param object $world
     * @return void
     */
    public static function booleanCheck(string $input,World $world){
        $input = trim($input);
        if (strlen($input) !== 1 || !self::isChar($input) || !self::sameCharBool($input)) {
            throw new InvalidArgumentException ('Input provided should be a char (Y/N)');
        }elseif ($input == "Y") {
            $world->showObstacles();
        }
    }
     /**
     * Function used to manage if the input given is a numeral
     * @param array $input
     * @return bool
     */
    private static function isDigit(array $inputArray)
    {
        return (ctype_digit($inputArray[0]) && ctype_digit($inputArray[1]));
    }

    /**
     * Function used to assure that the input is a character
     * @param string $input
     * @return bool
     */
    private static function isChar(string $input)
    {
        return (ctype_alpha($input));
    }

    /**
     * Function used to assure that the characters used are the ones supported (Y/N)
     * @param string $input
     * @return array
     */
    private static function sameCharBool(string $input){
        $charArray = ["N","Y"];
        return in_array($input,$charArray);
    }

    /**
     * Function used filter the input values on the movements (F/L/R)
     * @param string $input
     * @return void
     */
    private static function identicalValue(array $sequence){
        $moveArray = ["F","L","R"];
        $containsAllValues = !array_diff($sequence, $moveArray);
        //var_dump($containsAllValues);
        if(!$containsAllValues){
            throw new InvalidArgumentException("A unvalid command was given, please use F/L/R");
        }  
    }

    /**
     * Function used to assure that the characters used are the ones supported (N/S/E/W)
     * @param string $input
     * @return array
     */
    private static function sameChar(string $input){
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