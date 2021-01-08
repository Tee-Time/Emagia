<?php 

require_once 'Characters/character.php';
require_once 'Characters/hero.php';
require_once 'Battle/battle.php';
require_once 'Handy/writer.php';


class play{
    
   public $verify;
   
   public function display($text, $separator=0, $font = 0)
   {
       echo $font? '<b>'.$text.'</b> <br>':$text.'<br>';
       echo $separator?'------------------------<br>':'';
   }
    
   public function __construct()
   {
       
       //instantiate the 2 characters
       $orderus = new hero('Orderus');
       $beast = new character('Beast');
       
       //instantiate writer
       $writer = new writer();
       
       //initial display
       $writer->display('Initial stats',0);
       $writer->display('Orderus health:'.$orderus->health,0);
       $writer->display('Beast health:'.$beast->health,0);
       $writer->display('',0);
       
       //default set as beast hits first
       $game = new battle($beast, $orderus);
       $game->begin(); 
       
       $writer->celebration();
       
       //verify is used for unit testing
       $this->verify =  'END OF GAME';
   }
}



new play();
