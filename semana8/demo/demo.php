<?php

//Carrito de Compras

$productos = [
    ["id"=> 1, "nombre" => "Producto 1", "precio" => 20.5, "cantidad" => 10],
    ["id"=> 2, "nombre" => "Producto 2", "precio" => 15.0, "cantidad" => 5],
    ["id"=> 3, "nombre" => "Producto 3", "precio" => 8.0, "cantidad" => 8],
    ["id"=> 4, "nombre" => "Producto 3", "precio" => 12.0, "cantidad" => 6]
];

$carrito = [];

function buscarProductoPorId($id){
    global $productos;
    $longitud = count($productos);
    for($i = 0; $i < $longitud; $i++){
        if($productos[$i]['id'] === $id){
            return $productos[$i];
        }
    }
    return null;
}

function agregarAlCarrito($idProducto, $cantidadSolicitada){
    global $productos, $carrito;
    $producto = buscarProductoPorId($idProducto);

    if($producto){
        if($producto['cantidad'] >= $cantidadSolicitada){
            
            $carrito[] = [
                "id" => $producto['id'],
                "nombre" => $producto['nombre'],
                "cantidad" => $cantidadSolicitada,
                "precio" => $producto['precio']
            ];
            
            for($i =0; $i < count($productos); $i++){
                if($productos[$i]['id'] === $idProducto){
                    $productos[$i]['cantidad'] -= $cantidadSolicitada;
                    break;
                }
            }
            echo "Producto agregado al carrito";

        }else{
            echo "No tenemos producto suficiente";
        }
    }else{
        echo "Producto no encontrado";
    }

}

function calcularTotalCarrito(){
    global $carrito;
    $total = 0;
    foreach($carrito as $item){
        $total  += $item['precio'] * $item['cantidad'];
    }
    return $total;
}

agregarAlCarrito(1,5);
echo PHP_EOL;
agregarAlCarrito(2,7);
echo PHP_EOL;
agregarAlCarrito(3,5);
echo PHP_EOL;
agregarAlCarrito(5,1);
echo PHP_EOL;
echo "El total de su carrito es ". calcularTotalCarrito();