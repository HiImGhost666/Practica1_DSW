<?php
$titulo_pagina = "Registro de Animal";
require_once "../includes/header.php";

// Validación de campos obligatorios
if (
    empty($_POST['id']) ||
    empty($_POST['nombre']) ||
    empty($_POST['habitat']) ||
    empty($_POST['caracteristicas']) ||
    empty($_POST['categoria_id'])
) {
    echo "<p style='color:red;'>Error: Todos los campos son obligatorios.</p>";
    require_once "../includes/footer.php";
    exit;
}

// Recoger los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$habitat = $_POST['habitat'];
$categoria_id = $_POST['categoria_id'];
$caracteristicas_texto = $_POST['caracteristicas'];
$caracteristicas = explode(",", $caracteristicas_texto);

// Procesar los archivos subidos y guardarlos dentro de public/uploads
$carpetaImagenes = __DIR__ . "/uploads/images/";
$carpetaPdfs = __DIR__ . "/uploads/pdfs/";

// Guardar la imagen
$imagenPath = "";
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
    $imagenPath = $carpetaImagenes . $id . ".jpg";
    move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenPath);
}

// Guardar el PDF
$pdfPath = "";
if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === 0) {
    $pdfPath = $carpetaPdfs . $id . ".pdf";
    move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfPath);
}

// --- Mostrar los resultados ---
echo "<h1>Animal registrado correctamente</h1>";
echo "<p><strong>ID:</strong> $id</p>";
echo "<p><strong>Nombre:</strong> $nombre</p>";
echo "<p><strong>Hábitat:</strong> $habitat</p>";

// Mostrar imagen (ruta web visible)
if ($imagenPath != "") {
    $rutaWeb = "uploads/images/" . $id . ".jpg";
    echo "<p><img src='$rutaWeb' alt='$nombre' width='250'></p>";
}

// Mostrar características
echo "<h2>Características:</h2>";
echo "<ul>";
foreach ($caracteristicas as $c) {
    echo "<li>" . htmlspecialchars(trim($c)) . "</li>";
}
echo "</ul>";

// Mostrar PDF
if ($pdfPath != "") {
    $rutaWebPdf = "uploads/pdfs/" . $id . ".pdf";
    echo "<p><a href='$rutaWebPdf' target='_blank'>Ver la descripción en PDF</a></p>";
}

require_once "../includes/footer.php";
?>
