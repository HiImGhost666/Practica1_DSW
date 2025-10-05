<?php 
$titulo_pagina = "Registrar Animal";
require_once "../includes/header.php";
require_once "../data/datos.php";
?>

<h1>Registrar un nuevo animal</h1>

<!-- Formulario para registrar un nuevo animal -->
<form action="process-animal.php" method="POST" enctype="multipart/form-data">
    <label for="categoria">Categoría:</label>
    <select name="categoria_id" id="categoria" required>
        <?php
        foreach($categorias as $categoria){
            echo "<option value='" . $categoria['id'] . "'>" . htmlspecialchars($categoria['nombre']) . "</option>";
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

    <label for="caracteristicas">Características del animal:</label>
    <textarea name="caracteristicas" id="caracteristicas" rows="4" cols="50" required></textarea>
    <br><br>

    <label for="imagen">Imagen del animal:</label>
    <input type="file" name="imagen" id="imagen" accept="image/*" required>
    <br><br>
    
    <label for="pdf">PDF del animal:</label>
    <input type="file" name="pdf" id="pdf" accept="application/pdf" required>
    <br><br>

    <button type="submit">Registrar animal</button>
</form>

<?php
require_once "../includes/footer.php";
?>
