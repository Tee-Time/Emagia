<?php


use PHPUnit\Framework\TestCase;
require_once 'src/Characters/hero.php';
/*
 * This is used for testing hero.php
 * */

class HeroTest extends TestCase
{
    public  function test_create_hero()
    {
        $character = new hero('Orderus');
        $this->assertEquals($character->name, 'Orderus') && 
        $this->assertEquals($character->rapid_strike_luck, 10)&&
        $this->assertEquals($character->magic_shield_luck, 20);
    }
    
    public function test_substract_health_hero()
    {
        $character = new hero('Orderus');
        $health = $character->health;
        $verify_health = $health-10;
        $character->substract_health(10);
        $this->assertEquals($character->health,$verify_health);
    }
    
    public function test_get_strength_hero()
    {
        $character = new hero('Orderus');
        $this->assertEquals($character->strength,$character->get_strength());
    }
    
    public function test_check_rapid_strike()
    {
        $character = new hero('Orderus');
        $this->assertContains($character->check_rapid_strike(),[0,1]);
    }
    
    public function test_check_magic_shield()
    {
        $character = new hero('Orderus');
        $this->assertContains($character->check_magic_shield(),[0,1]);
    }
}
