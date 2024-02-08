<?php

    if (!$_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Acceso no permitido.";
        exit;
    }

    if (!isset($_FILES["archivo"]) && !$_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
        echo "Error, debe cargar un archivo PDF.";
        echo '<br><a href="index.html">Regresar</a>';
        exit;
    }

    // Verificar si se ha seleccionado un archivo  
    $nombreArchivo = $_FILES["archivo"]["name"];
    $rutaOrigen = "C:\Users\EDWARD\Downloads";
    $rutaCompleta = $rutaOrigen . DIRECTORY_SEPARATOR . $nombreArchivo;    

    // Verificar que el archivo sea de tipo PDF
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    if (strtolower($extension) != "pdf") {
        echo "Error: Solo se permiten archivos PDF.";
        echo '<br><a href="index.html">Regresar</a>';
        exit; // Salir del script
    }

    $rutaDestino = "C:\Users\EDWARD\Downloads\archivos_pdf";
    $rutaCompletaFinal = $rutaDestino . DIRECTORY_SEPARATOR."archivo_transformado.jpg";
  
    try {
        $imagick = new Imagick();
        $imagick->setResolution(300, 300); // Establece la resolución para la conversión
        $imagick->readImage($rutaCompleta);        
        $imagick->setImageFormat('jpeg');
        $imagick->writeImage($rutaCompletaFinal);
        $imagick->clear();
        $imagick->destroy();
        echo "La conversión se ha completado con éxito.";        
    } catch (Exception $e) {
        echo "Ha ocurrido un error: ",  $e->getMessage(), "\n";
    }

    echo '<br><a href="index.html">Regresar</a>';
    
?>

