<?php 
$titulo_pagina = "Test";
require_once "/workspaces/Practica1_archivos/includes/header.php";
require_once "/workspaces/Practica1_archivos/data/datos.php";

if (isset($_GET['id'])){
    $idCategoria = (int) $_GET['id'];
}else{
    echo "<p>Error: No se especificó ninguna categoria.</p>";
    exit;
}


$categoriaEncontrada = null;
foreach($categorias as $categoria){
    if($categoria['id'] == $idCategoria){
        $categoriaEncontrada = $categoria;
        break;
    }
}

if(!$categoriaEncontrada){
    echo '<p>Error: Categoria no encontrada</p>';
    exit;
}

echo '<h1>' . htmlspecialchars($categoriaEncontrada['nombre']) . '</h1>';
echo '<p>' . htmlspecialchars($categoriaEncontrada['descripcion']) . '</p>';

echo '<h2>Animales en esta categoria:</h2>';
echo '<ul>';
foreach($animales as $animal){
    if($animal['categoria_id'] == $idCategoria){
        echo "<li><a href='animal.php?id=" . $animal['categoria_id'] . "'>" . htmlspecialchars($animal['nombre']) . "</a></li>";
    }
}

echo '</ul>';
require_once "/workspaces/Practica1_archivos/includes/footer.php";

?>;