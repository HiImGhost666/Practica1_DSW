<?php
$titulo_pagina = "Actualizar animal";
require_once "../includes/header.php";

require_once "../data/datos.php";

// --- OBTENER EL ID DEL ANIMAL DESDE LA URL ---
if (!isset($_GET['id'])) {
    echo "<p style='color:red;'>Error: No se ha especificado ningún animal.</p>";
    require_once "../includes/footer.php";
    exit;
}

$id = $_GET['id'];

// --- BUSCAR EL ANIMAL EN EL ARRAY ---
$animalEncontrado = null;
foreach ($animales as $clave => $animal) {
    if ($clave == $id) {
        $animalEncontrado = $animal;
        break;
    }
}

// Si no se encuentra el animal
if ($animalEncontrado == null) {
    echo "<p style='color:red;'>Error: No se encontró el animal con ID $id.</p>";
    require_once "../includes/footer.php";
    exit;
}

// --- SI SE HA ENVIADO EL FORMULARIO ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imagenActualizada = false;
    $pdfActualizado = false;

    // Rutas reales del servidor (guardado)
    $rutaImagenServidor = __DIR__ . "/uploads/images/" . $id . ".jpg";
    $rutaPdfServidor = __DIR__ . "/uploads/pdfs/" . $id . ".pdf";

    // Subir nueva imagen (si se seleccionó una)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagenServidor);
        $imagenActualizada = true;
    }

    // Subir nuevo PDF (si se seleccionó uno)
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === 0) {
        move_uploaded_file($_FILES['pdf']['tmp_name'], $rutaPdfServidor);
        $pdfActualizado = true;
    }

    // Mensajes de confirmación
    if ($imagenActualizada || $pdfActualizado) {
        echo "<p style='color:green;'>Archivos actualizados correctamente.</p>";
    } else {
        echo "<p style='color:orange;'>No se ha subido ningún archivo nuevo.</p>";
    }
}

// --- MOSTRAR INFORMACIÓN Y FORMULARIO ---
echo "<h1>Actualizar archivos del animal: " . htmlspecialchars($animalEncontrado['nombre']) . "</h1>";
echo "<p><strong>Hábitat:</strong> " . htmlspecialchars($animalEncontrado['habitat']) . "</p>";

// Rutas visibles desde el navegador
$rutaWebImagen = "uploads/images/" . $id . ".jpg";
$rutaWebPdf = "uploads/pdfs/" . $id . ".pdf";

// Mostrar imagen actual si existe
if (file_exists(__DIR__ . "/uploads/images/" . $id . ".jpg")) {
    echo "<h3>Imagen actual:</h3>";
    echo "<img src='$rutaWebImagen' alt='" . htmlspecialchars($animalEncontrado['nombre']) . "' width='250'><br><br>";
} else {
    echo "<p>No hay imagen guardada aún.</p>";
}

// Mostrar PDF actual si existe
if (file_exists(__DIR__ . "/uploads/pdfs/" . $id . ".pdf")) {
    echo "<p><a href='$rutaWebPdf' target='_blank'>Ver PDF actual</a></p>";
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="imagen">Subir nueva imagen:</label>
    <input type="file" name="imagen" id="imagen" accept="image/*"><br><br>

    <label for="pdf">Subir nuevo PDF:</label>
    <input type="file" name="pdf" id="pdf" accept="application/pdf"><br><br>

    <button type="submit">Actualizar archivos</button>
</form>

<?php
require_once "../includes/footer.php";
?>
