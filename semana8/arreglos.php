<?php
// arreglos indexados
$frutas = array("Manzana", "Banana", "Cereza");
echo $frutas[0];
array_push($frutas, "Naranja");
print_r($frutas);
 
$posicion = array_search("Naranja",$frutas);
echo $posicion;
 
//arreglo asociativo
$edades = array("Juan" => 25, "Ana" => 22, "Pedro" => 30);
echo $edades["Ana"];
 
//arreglo multidimensional
$personas = array(
            array("Nombre" => "Juan", "Edad" => 25),
            array("Nombre" => "Ana", "Edad" => 22)
);
 
echo $personas[1]["Nombre"];