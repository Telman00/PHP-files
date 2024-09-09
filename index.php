<?php
/* Magic methods
Accsess Modifiers
Inheritance
Static Methods
Static Properties

Abstract Classes
Interfaces
Traits

MVC
*/

class Car {
    public $color;
    public $model;

    // Konstruktor metodu
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }

    public function getDetails() {
        return "My car is a " . $this->color . " " . $this->model . ".";
    }
}

// Obyekt yaratmaq və konstruktoru çağırmaq
$myCar = new Car("red", "Toyota");
echo $myCar->getDetails(); // My car is a red Toyota.






?>









