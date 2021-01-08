<?php 


class battle{
    
    
    public $attacker;
    public $defender;
    public $all_turns;
    public $turns;
    
    public function __construct($attacker, $defender)
    {
        //default set as beast hits first
        $this->attacker = $attacker;
        $this->defender = $defender;
        $this->all_turns = 20;
        $this->turns = 1;
        
        
        $this->set_sides($attacker,$defender);
    }
    
    
    /*set who starts the battle */
    public function set_sides($attacker, $defender)
    {
        
        // default attacker is set to beast
        //if the speed (and) luck conditions indicate different switch roles  
        
        if($defender->speed > $attacker->speed)
        {

            //switch sides
            $this->attacker = $defender;
            $this->defender = $attacker;
            
        }
        elseif ($defender->speed == $attacker->speed)
        {
            if($defender->luck > $attacker->speed)
            {
                //switch sides
                $this->attacker = $defender;
                $this->defender = $attacker;
                
            }
        }
    }
    
    public function winner()
    {
        
        // if both have the same value for health both are winning
        return ($this->attacker->health !=  $this->defender->health ) ?$this->attacker->health > $this->defender->health ? $this->attacker->name: $this->defender->name : 'Both';
        
    }
    
    public function check_game_end()
    {
        //ends the game by running out of turns 
        if ( $this->turns == $this->all_turns + 1 )
        {
            return $this->winner();
        }
        else
        {//ends the game by no health
            if($this->attacker->health <= 0)
            {
                return $this->defender->name;
            }
            elseif($this->defender->health <= 0)
            {
                return $this->attacker->name;
            }
        }
        
        return 0;
    }
    
    public function calc_damage()
    {
        return $this->attacker->strength - $this->defender->defence;
    }
    
    public function begin()
    {   
        $writer = new writer();
        while($this->turns <= $this->all_turns )
        {

            $writer->display('Round '.$this->turns, 1);
            $defender = $this->defender;
            $attacker = $this->attacker;
            
            $damage = 0;

            //handle the attcker part
            //check if defender dodge hit
                        
            $writer->display($attacker->name.' attacked ', 0);
            
            if($defender->check_dodge())
            {
                $writer->display($defender->name.' dodge hit', 0, 1);
            }
            else
            {
                //defender did not dodge the hit
                //calculate damage if did not dodge the hit
                $damage = $this->calc_damage();
                
                //check if has special defend skills                
                if($defender->check_has_defend_skill())
                {
                    //check if can use it this turn
                    if($defender->check_magic_shield())
                    {
                        //if magic shield is used recalculate the damage
                        $damage/=2;
                        $writer->display($defender->name.' used magic shield ', 0, 1);
                    }
                }
                
                //substract damage from defender's life
                $defender->substract_health($damage);
                $writer->display($defender->name.' loses '.$damage, 0);

                //attacker part
                //check if attacker has special attack skills
                if($attacker->check_has_attack_skill())
                {
                    if($attacker->check_rapid_strike())
                    {
                        //substract damage from defender's life
                        $defender->substract_health($damage);
                        $writer->display($attacker->name.' uses rapid strike ', 0, 1);
                        $writer->display($defender->name.' loses '.$damage, 0);
                    }
                    
                }                        
            }
            

            $writer->display( $attacker->name.' health:'.$attacker->health);
            $writer->display( $defender->name.' health:'.$defender->health);
            
            $writer->display('');
            
            
            //next round
            
            $this->turns++;
            
            //check if we have finished the game
            $winner = $this->check_game_end();
            
            //display the winner if the game ends
            if($winner)
            {
                $writer->display($winner.' win', 0, 1);
                break;
            }
            
            //switch places
            $this->attacker = $defender;
            $this->defender = $attacker;
            
        }
    }
    
    
}
