<?php 
$titulo_pagina = "Test";
require_once "/workspaces/Practica1_archivos/includes/header.php";
require_once "/workspaces/Practica1_archivos/data/datos.php";
?>

<h1>Registrar un nuevo animal</h1>

<form action="process-animal.php" method="POST" enctype="multipart/form-data">
    <label for="categoria">Categoria:</label>
    <select name="categoria_id" id="categoria_id" required>
        <?php
        foreach($categorias as $categoria){
            echo "<option value='" . $categoria['categoria_id'] . "'>" . htmlspecialchars($categoria['nombre']) . "</option>";
        }
        ?>
        </select>
        <br><br>
        
        <label for="id">ID del animal:</label>
        <input type="number" name="id" id="id" required>
        <br><br>

        <label for="nombre">Nombre del animal:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        
        <label for="habitat">Hábitat del animal:</label>
        <input type="text" name="habitat" id="habitat" required>
        <br><br>

        <label for="caracteristicas">Caracteristicas del animal:</label>
        <textarea name="caracteristicas" id="caracteristicas" rows="4" cols="50" required></textarea>
        <br><br>

        <label for="imagen">Imagen del animal:</label>
        <input type="file" name="imagen" id="imagen" required>
        <br><br>
        
        <label for="pdf">PDF del animal:</label>
        <input type="file" name="pdf" id="pdf" required>
        <br><br>

        <button type="submit">Registrar el puto animal</button>
    </form>



<?php
require_once "/workspaces/Practica1_archivos/includes/footer.php";
?>;