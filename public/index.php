<?php 
$titulo_pagina = "Test";
include "../includes/header.php";

require "../data/datos.php";

// Listar las categorías con enlaces
echo "<ul>";
foreach($categorias as $categoria){
    echo '<li>';
    printf('<a href="category.php?id=%s">%s</a>', $categoria['id'], $categoria['nombre']);
    echo '</li>';
}

echo "</ul>";

include "../includes/footer.php";

?>;