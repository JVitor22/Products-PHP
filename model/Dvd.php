<?php

class Dvd extends Product implements Perecivel
{
    private $title;
    private $year;
    
    
    
    public function __construct($code, $price , $title , $year)
    {
        parent::__construct($code, $price);
        $this->code = $code;
        $this->price = $price;
        $this->title = $title;
        $this->year = $year;
        
    }
    public function getTitle()
    {
        return $this->Title;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setTitle($title)
    {
        $this->Title = $title;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
    public function isOverdue($date)
    {}

    public function insert($obj)
    {
        $sql1 = 'INSERT INTO produto(code,price) VALUES(
        :code,:price)';
        $query1 = Connection::prepare($sql1);
        $query1->bindValue('code', $obj->code);
        $query1->bindValue('price', $obj->price);
        $result = $query1->fetch(PDO::FETCH_ASSOC);
        $result["code"];
        $query1->execute();
        $sql = 'INSERT INTO dvd(code_dvd,price_dvd,title,year) VALUES(:code,:price,
        :title, :year)';
        $query = Connection::prepare($sql);
        $query->bindValue('code', $obj->code);
        $query->bindValue('price', $obj->price);
        $query->bindValue('title', $obj->title);
        $query->bindValue('year', $obj->year);
        return $query->execute();
    }
    public function find($code = null){
        $sql =  "SELECT * FROM dvd WHERE code_dvd = :code";
        $consulta = Connection::prepare($sql);
        $consulta->bindValue('code',$this->code);
        $consulta->execute();
    }
    
    public function findAll(){
        $sql = "SELECT * FROM dvd";
        $consulta = Connection::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    public function findYear(){
        $sql = 'SELECT year FROM products.dvd WHERE year = 2019';
        $query = Connection::prepare($sql);
        return $query->execute();
    }

    
    
    
}

