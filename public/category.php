<?php 
$titulo_pagina = "Categoría";
require_once "../includes/header.php";
require_once "../data/datos.php";

// Recuperar ID de la categoría
if (isset($_GET['id'])){
    $idCategoria = (int) $_GET['id'];
}else{
    echo "<p style='color:red;'>Error: No se especificó ninguna categoría.</p>";
    require_once "../includes/footer.php";
    exit;
}

// Buscar la categoría
$categoriaEncontrada = null;
foreach($categorias as $categoria){
    if($categoria['id'] == $idCategoria){
        $categoriaEncontrada = $categoria;
        break;
    }
}

if(!$categoriaEncontrada){
    echo "<p style='color:red;'>Error: Categoría no encontrada</p>";
    require_once "../includes/footer.php";
    exit;
}

// Mostrar info de la categoría
echo "<h1>" . htmlspecialchars($categoriaEncontrada['nombre']) . "</h1>";
echo "<p>" . htmlspecialchars($categoriaEncontrada['descripcion']) . "</p>";

// Listado de animales
echo "<h2>Animales en esta categoría:</h2>";
echo "<ul>";
foreach($animales as $idAnimal => $animal){
    if($animal['categoria_id'] == $idCategoria){
        echo "<li><a href='animal.php?id=" . htmlspecialchars($idAnimal) . "'>" . htmlspecialchars($animal['nombre']) . "</a></li>";
    }
}
echo "</ul>";

require_once "../includes/footer.php";
?>