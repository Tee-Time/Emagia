<?php


use PHPUnit\Framework\TestCase;
require_once 'src/Characters/character.php';
/*
 * This is used for testing character.php
 * */
class CharacterTest extends TestCase
{
    public  function test_create_character()
    {        
        $character = new character('Orderus');
        $this->assertEquals($character->name, 'Orderus');
    }
    
    public function test_substract_health()
    {        
        $character = new character('Orderus');
        $health = $character->health;
        $verify_health = $health-10;
        $character->substract_health(10);
        $this->assertEquals($character->health,$verify_health);        
    }
    
    public function test_get_strength()
    {
        $character = new character('Orderus');
        $this->assertEquals($character->strength,$character->get_strength());
    }
    
}
