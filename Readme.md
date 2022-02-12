## Mars Rover

#### Run Info

Application Version `PHP 7.4`

`composer install`

`php app.php` for executing application

#### Implementation

The grid is defined from 0,0(bottom left) to the max size specified by the user (upper right corner), giving only positive coordenates to the world. (The world will have a position less than the quantity of the grids due to starting in 0 0)

    Y|        5 5
     |
     |
     |________
    0 0       X

The input of the size of the world has been defined with the smallest size usable of 6x6 with no limit on the maximum size.

All the inputs have also been limited, only allowing the values provided in the format suggested.

The ability to place the rover in the world has been controlled to be only achiveable inside the defined coordenates of the world, between minimum 0,0 and maximum introduced by the user. (5 5 if the user inputs 6 6 on world size)

The movement of the rover has been defined as 2D, moving left means that the rover will "slide" to the left instead of turning in the same spot and needing a "forward" order after that (3D).

The rover will evaluate the following step before taking it, and will stop if an obstacle is found in the next movement.

The boundaries of the world have been defined as "obstacles" and the rover will stop if a boundary is reached.

The obstacles have been generated randomly, using the grid e.g 100x100 and dividing the number by 3 and rounding that down, and they have not been controlled, meaning that an obstacle can be "repeated" in the same position multiple times. Also the obstacles will not be placed in the spot where the rover is located.
(Quantity of objects can be modified in the generateObstacles function of the class World)

