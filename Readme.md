# Mars Rover

## Run Info

Application Version `PHP 7.4`

`composer install`

`php app.php` for executing application

#### Implementation

The grid is defined from 0,0(bottom left) to the max size specified by the user, giving only positive coordenates to the world.

The input of the size of the world has been defined with the smallest size of 6x6 with no limit on the maximum size

The ability to place the rover in the world has been controlled to be only achiveable inside the defined coordenates of the world, between minimum 0,0 and maximum introduced by the user.

The movement of the rover has been defined as 2D, moving left means that the rover will "slide" to the left instead of turning in the same spot and needing a "forward" order after that (3D).

The boundries of the world have been defined as "obstacles" and the rover will stop if a boundry is reached.

The obstacles have been generated randomly, using the grid e.g 100x100 and dividing the number by 3 and rounding that down, and they have not been controlled, meaning that an obstacle can be "repeated" in the same position multiple times. Also the objects will not be placed in the spot where the rover is located.
(Quantity of objects can be modified in the generateObstacles function of the class World)

