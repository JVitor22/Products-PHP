<?php
include_once __DIR__ . '/../model/Product.php';
include_once __DIR__ . '/../model/Perecivel.php';
include_once __DIR__ . '/../model/Connection.php';
class Leite extends Product implements Perecivel 
{
    private $brand;
    private $volumn;
    private $dateValidity;
    
    
    
        
    
    public function __construct($code , $price , $brand , $volumn , $dateValidity)
    {
        
        parent::__construct($code, $price);
        $this->price = $price;
        $this->code = $code;
        $this->brand = $brand;
        $this->volumn = $volumn;
        $this->dateValidity = $dateValidity;
        
        
    }
    

    public function getCode()
    {
        // TODO Auto-generated method stub
        return parent::getCode();
    }

    public function getPrice()
    {
        // TODO Auto-generated method stub
        return parent::getPrice();
    }

    public function setCode($code)
    {
        // TODO Auto-generated method stub
        
    }

    public function setPrice($price)
    {
        // TODO Auto-generated method stub
        
    }

    
    public function getBrand()
    {
        return $this->brand;
    }

    public function getVolumn()
    {
        return $this->volumn;
    }

    public function getDateValidity()
    {
        return $this->dateValidity;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setVolumn($volumn)
    {
        $this->volumn = $volumn;
    }

    public function setDateValidity($dateValidity)
    {
        $this->dateValidity = $dateValidity;
    }
    public function serialize(){
        return json_encode(get_object_vars($this));
    }
    
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
        $sql = 'INSERT INTO leites(code_leite,price_leite,brand,volumn,date_validity) VALUES(:code,:price,
        :brand,:volumn,:dateValidity)';
        $query = Connection::prepare($sql);
        $query->bindValue('code', $obj->code);
        $query->bindValue('price', $obj->price);
        $query->bindValue('brand', $obj->brand);
        $query->bindValue('volumn', $obj->volumn);
        $query->bindValue('dateValidity', $obj->dateValidity);    
        return $query->execute();
    }
    public function find($id = null){
        $sql =  "SELECT * FROM leites WHERE code_leite = :code_leite";
        $consulta = Connection::prepare($sql);
        $consulta->bindValue('code',$this->code);
        $consulta->execute();
    }
    
    public function findAll(){
        $sql = "SELECT * FROM leites";
        $consulta = Connection::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    public function isOverdue($date)
    {
        // Explode data validade Leite recebida parâmetro
        $arr = [];
        $str = $date;
        $arr = explode("-", $str);
        $year = intval($arr[0]);
        $month = intval($arr[1]);
        $day = intval($arr[2]);
        // Explode data dia
        $data = date('Y-m-d');
        $arr2 = [];
        $str2 = $data;
        $arr2 = explode("-", $str2);
        $year2 = intval($arr2[0]);
        $month2 = intval($arr2[1]);
        $day2 = intval($arr2[2]);
        
        
        if($year <= $year2 and $month <= $month2 and $day <= $day2){
            return true;
            
        }else{
            return false;
        }
        
        
        
    }

}


