<?php


use PHPUnit\Framework\TestCase;
require_once 'src/play.php';
/*
 * This is used for testing play.php
 * */
class PlayTest extends TestCase
{
    public  function test_create_hero()
    {
        $game = new play();
        $this->assertEquals($game->verify,'END OF GAME');
    }
  
}
