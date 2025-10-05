<?php 
$titulo_pagina = "Animal";
require_once "../includes/header.php";
require_once "../data/datos.php";

// Recuperar el ID del animal desde la URL
if (isset($_GET['id'])) {
    $idAnimal = $_GET['id'];
} else {
    echo "<p style='color:red;'>Error: No se especificó ningún animal.</p>";
    require_once "../includes/footer.php";
    exit;
}

// Buscar el animal usando la clave directamente
if (isset($animales[$idAnimal])) {
    $animalEncontrado = $animales[$idAnimal];
} else {
    echo "<p style='color:red;'>Error: Animal no encontrado.</p>";
    require_once "../includes/footer.php";
    exit;
}

// Mostrar información del animal
echo "<h1>" . htmlspecialchars($animalEncontrado['nombre']) . "</h1>";
echo "<p><strong>Hábitat:</strong> " . htmlspecialchars($animalEncontrado['habitat']) . "</p>";

// Imagen
if (!empty($animalEncontrado['imagen']) && file_exists($animalEncontrado['imagen'])) {
    echo "<img src='" . htmlspecialchars($animalEncontrado['imagen']) . "' alt='" . htmlspecialchars($animalEncontrado['nombre']) . "' width='300'>";
} else {
    echo "<p>No hay imagen disponible.</p>";
}

// Características
echo "<h2>Características:</h2>";
echo "<ul>";
foreach ($animalEncontrado['caracteristicas'] as $caracteristica) {
    echo "<li>" . htmlspecialchars($caracteristica) . "</li>";
}
echo "</ul>";

// PDF
if (!empty($animalEncontrado['pdf']) && file_exists($animalEncontrado['pdf'])) {
    echo "<p><a href='" . htmlspecialchars($animalEncontrado['pdf']) . "' target='_blank'>Ver descripción en PDF</a></p>";
} else {
    echo "<p>No hay PDF disponible.</p>";
}

// Enlace a update-animal.php
echo "<p><a href='update-animal.php?id=" . htmlspecialchars($idAnimal) . "'>Actualizar este animal</a></p>";

require_once "../includes/footer.php";
?>
