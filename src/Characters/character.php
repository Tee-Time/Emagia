<?php 


class character{
    
    public $health;
    public $strength;
    public $defence;
    public $speed;
    public $luck;
    public $name;
    
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->health = rand(60,90);
        $this->strength = rand(60,90);
        $this->defence = rand(40,60);
        $this->speed = rand(40,60);
        $this->luck = rand(25,40);
        
    }
    
    
    public function substract_health($damage)
    {
        $this->health -= $damage;
    }
    
    public function get_strength()
    {
        return $this->strength;
    }
    
    public function check_dodge()
    {
        return $this->luck < rand(0,100);
    }
    
    public function check_has_defend_skill()
    {
        return isset($this->magic_shield_luck);
    }
    
    public function check_has_attack_skill()
    {
        return isset($this->rapid_strike_luck);
    }
    
}
