<?php 
$titulo_pagina = "Test";

//Incluimos cabecera y datos
require_once "/workspaces/Practica1_archivos/includes/header.php";
require_once "/workspaces/Practica1_archivos/data/datos.php";


//REcuperar el ID desde la URL
if (isset($_GET['id'])){
    $idAnimal = (int) $_GET['id'];
}else{
    echo "<p>Error: No se especificó ningun animal.</p>";
    exit;
}

//Buscamos el animal en el array
$animalEncontrado = null;
foreach($animales as $animal){
    if($animal['categoria_id'] == $idAnimal){
        $animalEncontrado = $animal;
        break;
    }
}

//Validamos que existe
if(!$animalEncontrado){
    echo '<p>Error: Animal no encontrada</p>';
    exit;
}

//Mostrar info del animal
echo '<h1>' . htmlspecialchars($animalEncontrado['nombre']) . '</h1>';
echo '<p><strong>Hábitat:</strong>' . htmlspecialchars($animalEncontrado['habitat']) . '</p>';

echo "<img src='" . htmlspecialchars($animalEncontrado['imagen']) . "' alt='" . htmlspecialchars($animalEncontrado['nombre']) . "' width='300'>";


echo "<h2>Caracteríscticas:</h2>";
echo "<ul>";

foreach($animalEncontrado['caracteristicas'] as $caracteristica){
    echo "<li>" . htmlspecialchars($caracteristica) . "</li>";
}
echo "</ul>";

echo "<p><a href='" . htmlspecialchars($animalEncontrado['pdf']) . "' target='_blank'>Ver descripcion en PDF</a></p>";
echo "<p><a href='update-animal.php?id=" . htmlspecialchars($animalEncontrado['categoria_id']) . ">Actualizar este animal.</a></p>";

require_once "/workspaces/Practica1_archivos/includes/footer.php";

?>;