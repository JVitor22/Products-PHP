<?php
include __DIR__ . '/..model/Leite.php';

class Leite_control
{
    function insert($obj){
        $leite = new Leite();
        return $leite->insert($obj);
    }
    
    
}

