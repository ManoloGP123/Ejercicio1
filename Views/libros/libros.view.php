<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <!-- Asegúrate de cambiar las rutas de los scripts a los nombres correctos para tus archivos JS de libros -->
    <script src="./libros.model.js"></script>
    <script src="./libros.controller.js"></script>
</head>

<body>
    <h2 class="text-center my-4">Gestión de Libros</h2>

    <table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año de Publicación</th>
                <th>Leído</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tablalibros">
            <!-- Los datos de los libros se cargarán aquí -->
        </tbody>
    </table>
</body>

</html>
