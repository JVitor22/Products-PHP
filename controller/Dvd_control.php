<?php
include __DIR__ . '/..model/Dvd.php';
class Dvd_control
{
    function insert($obj){
        $dvd = new Dvd();
        return $dvd->insert($obj);
    }
    
}

