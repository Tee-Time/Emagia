<?php 

class writer{
    
    //used for displaying content
    
    public function display($text, $separator=0, $font = 0 )
    {
        echo $font? '<b>'.$text.'</b> <br>':$text.'<br>';
        echo $separator?'------------------------<br>':'';
    }
    
    public function celebration()
    {
        $this->display('END OF GAME!',1,1);
    }
    
}
