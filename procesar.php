<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //Conecto este archivo con el html a través de los name
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    //Creo arrays para almacenar datos dummies sobre los productos
    $productos = [
        "producto 1 - A" => ["nombre" => "producto 1", "categoria" => "Categoría A", "cantidad" => 20, "precio" => 9.99],
        "producto 1 - B" => ["nombre" => "producto 1", "categoria" => "Categoría B", "cantidad" => 23, "precio" => 19.99],
        "producto 1 - C" => ["nombre" => "producto 1", "categoria" => "Categoría C", "cantidad" => 2, "precio" => 29.99],
        "producto 2 - A" => ["nombre" => "producto 2", "categoria" => "Categoría A", "cantidad" => 18, "precio" => 3.99],
        "producto 2 - B" => ["nombre" => "producto 2", "categoria" => "Categoría B", "cantidad" => 9, "precio" => 13.99],
        "producto 2 - C" => ["nombre" => "producto 2", "categoria" => "Categoría C", "cantidad" => 17, "precio" => 23.99],
        "producto 3 - A" => ["nombre" => "producto 3", "categoria" => "Categoría A", "cantidad" => 21, "precio" => 15],
    ];

    //Nombre único del producto
    $claveProducto = $nombre . " - " . substr($categoria, -1);

    //El producto concreto seleccionado
    $productoSeleccionado = $productos[$claveProducto];

    
    if (array_key_exists($claveProducto, $productos)) {

        // Calcular el precio total según la cantidad seleccionada
        $precio = $productoSeleccionado["precio"];
        $precioTotal = $precio * $cantidad;

        // Imprimir la selección del usuario
        echo "<h2>Resumen de tu pedido:</h2>";
        echo "<p>Producto seleccionado: " . $productoSeleccionado["nombre"] . "</p>";
        echo "<p>Categoría: " . $productoSeleccionado["categoria"] . "</p>";
        echo "<p>Cantidad seleccionada: " . $cantidad . "</p>";
        echo "<p>Precio unitario: " . number_format($precio, 2) . "€" . "</p>";
        echo "<p><strong>Precio total: " . number_format($precioTotal, 2) . "€" . "</strong></p>";
    } else {
        echo "<p>El producto seleccionado no se encuentra disponible.</p>";
    }
}
?>
