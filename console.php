<?php

class Console {
    public function input($label){
        echo $label ." : ";
       return trim(fgets(STDIN)) ;
    }
}
