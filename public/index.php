<?php 
$titulo_pagina = "Test";
include "/workspaces/Practica1_archivos/includes/header.php";

require "/workspaces/Practica1_archivos/data/datos.php";

echo "<ul>";
foreach($categorias as $categoria){
    echo '<li>';
    printf('<a href="category.php?id=%s">%s</a>', $categoria['id'], $categoria['nombre']);
    echo '</li>';
}

echo "</ul>";

include "/workspaces/Practica1_archivos/includes/footer.php";

?>;