<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Archivo PDF</title>
</head>
<body>
    <form action="procesar.php" method="post" enctype="multipart/form-data">
        <label for="archivo">Seleccionar archivo PDF:</label>
        <input type="file" name="archivo" id="archivo" accept=".pdf">
        <br>
        <button type="submit">Cargar PDF 2</button>
    </form>
</body>
</html>
