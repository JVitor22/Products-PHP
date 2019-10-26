<html>
<h1>Product review</h1>
	
	<?php
include __DIR__ . '\model\Leite.php';
include __DIR__ . '\model\Dvd.php';
try {
    $milk = new Leite(1, 2.99, "Hitambe", "1L", date("2019-10-12"));
    $milk2 = new Leite(2, 2.89, "Longa Vilma", "1L", date("2019-09-05"));
    $milk3 = new Leite(3, 3.19, "Via Lactea", "1L", date("2020-05-11"));
    $milk4 = new Leite(4, 4.10, "LactaMil", "1L", date("2019-11-01"));
    $milk5 = new Leite(5, 1.19, "Milky", "1L", date("2019-12-01"));
    $milk6 = new Leite(6, 5.10, "Desnatados", "1L", date("2017-05-13"));
    $dvd = new Dvd(7, 99.00, "Como programar em C#", 2059);
    $dvd2 = new Dvd(8, 25.00, "Python com semi-colon", 1700);
    $dvd3 = new Dvd(9, 20.00, "HTML eh Linguagem de Programacao", 2059);
    $dvd4 = new Dvd(10, 95.98, "Java sem tipagem", 2019);
} catch (Exception $e) {
    $e->getMessage();
}
try {
    $milk->insert($milk);
    $milk2->insert($milk2);
    $milk3->insert($milk3);
    $milk4->insert($milk4);
    $milk5->insert($milk5);
    $milk6->insert($milk6);
    $dvd->insert($dvd);
    $dvd2->insert($dvd2);
    $dvd3->insert($dvd3);
    $dvd4->insert($dvd4);
} catch (Exception $e) {
    $e->getMessage();
    echo"Objetos ja inseridos no BD";
}


$estoque = array(
    'Leite 1 (id 1)' => $milk,
    'Leite 2 (id 2)' => $milk2,
    'Leite 3 (id 3)' => $milk3,
    'Leite 4 (id 4)' => $milk4,
    'Leite 5 (id 5)' => $milk5,
    'Leite 6 (id 5)' => $milk6,

    'DVD 1 (id 7)' => $dvd,
    'DVD 2 (id 8)' => $dvd2,
    'DVD 3 (id 9)' => $dvd3,
    'DVD 4 (id 10)' => $dvd4
);
$totalValue = 0;
while ($obj = current($estoque)) {
    if (is_a($obj, 'Product')) {
        $totalValue += $obj->getPrice();
    }
    if (is_a($obj, 'Leite')) {
        if ($obj->isOverdue($obj->getDateValidity()) == true) {
            echo "<br>";
            echo "O objeto " . key($estoque) . " esta vencido!" . " Validade: " . $obj->getDateValidity() . " / Data de hoje: " . date('Y-m-d');
        }
    }
    if (is_a($obj, 'Dvd')) {
        if ($obj->getYear() == 2059) {
            echo "<br>";
            echo "O objeto " . key($estoque) . " foi lancado em " . $obj->getYear();
        
        }
    }
    next($estoque);
}
echo "<br>";
echo "VALOR TOTAL DOS PRODUTOS: " .$totalValue . " R$";
echo "<br>";
echo "<br>";

//TODOS PRODUTOS NO FORMATO JSON
echo "TODOS PRODUTOS";
echo "<br>";
echo "<br>";
$json_milk = $milk->findAll();
print_r(json_encode($json_milk));
echo "<br>";
echo "<br>";
$json_dvd = $dvd->findAll();
print_r(json_encode($json_dvd));

?>







	
