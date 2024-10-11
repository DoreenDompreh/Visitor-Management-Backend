<?php 
//classes and objects

class Fruit{
    //properties
    public $name;
    public $color;

    public function __construct()
    {
        $this->name = "banana";
        $this->color = "red";
    }
    public function getName(){
        return $this->name;
    }
    public function getColor(){
        return $this->color;
    }
}
$banana = new Fruit();
echo $banana->getName();