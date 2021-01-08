<?php 


class hero extends character{
 
     
    public $rapid_strike_luck;
    public $magic_shield_luck;
    
    
    public function __construct($name)
    {
         $this->name = $name;
         $this->health = rand(70,100); 
         $this->strength = rand(70,80);
         $this->defence = rand(45,55);
         $this->speed = rand(40,50);
         $this->luck = rand(10,30);
         
         $this->rapid_strike_luck = 10;
         $this->magic_shield_luck = 20;
    }
     
     public function check_rapid_strike()
     {
         //10% chance
         return $this->rapid_strike_luck < rand(0,100);
     }
     
     public function check_magic_shield()
     {
         //20% change
         return $this->magic_shield_luck < rand(0,100);
     }

}