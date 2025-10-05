<?php
require_once "includes/header.php";
require_once "data/datos.php";

if (
    empty($_POST['id']) ||
    empty($_POST['nombre']) ||
    empty($_POST['habitat']) ||
    empty($_POST['caracteristicas']) ||
    empty($_POST['categoria_id'])
) {
    echo "<p>Error: Todos los campos son obligatorios.</p>";
    exit;
}

$id = (int) $_POST['id'];
$nombre = htmlspecialchars($_POST['nombre']);
$habitat = htmlspecialchars($_POST['habitat']);
$categoria_id = (int) $_POST['categoria_id'];

$caracteristicas_texto = $_POST['caracteristicas'];
$caracteristicas = explode(",", $caracteristicas_texto);


// Carpeta destino
$uploadDirImg = "uploads/images/";
$uploadDirPdf = "uploads/pdfs/";

// Guardar imagen (si se subió)
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
    $imagenPath = "uploads/images/" . $id . ".jpg"; 
    move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenPath);
}

if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === 0) {
    $pdfPath = "uploads/pdfs/" . $id . ".pdf"; 
    move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfPath);
}


echo "<h1>Animal registrado correctamente</h1>";
echo "<p><strong>ID:</strong> $id</p>";
echo "<p><strong>Nombre:</strong> $nombre</p>";
echo "<p><strong>Hábitat:</strong> $habitat</p>";

if ($imagenPath != "") {
    echo "<p><img src='$imagenPath' alt='$nombre' width='250'></p>";
}

echo "<h2>Características:</h2>";
echo "<ul>";
foreach ($caracteristicas as $c) {
    echo "<li>" . trim($c) . "</li>"; // trim() quita espacios al inicio y fin
}
echo "</ul>";

if ($pdfPath != "") {
    echo "<p><a href='$pdfPath' target='_blank'>Ver descripción en PDF</a></p>";
}

require_once "includes/footer.php";
?>