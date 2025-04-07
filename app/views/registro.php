<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Registro | Usuario</title>
</head>

<body class="mb-4">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">REGISTRO USUARIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido"
                aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Formulario de Contacto</h2>
        <form action="/<?= $_SESSION['rootFolder'] ?>/Auth/registro" method="POST">
            <div class="mb-3">
                <label for="nombreCompleto" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" required>
            </div>

            <div class="mb-3">
                <label for="correoElectronico" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correoElectronico" name="correo" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Número de teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>

            <div class="mb-3">
                <label for="codigoPostal" class="form-label">Código postal</label>
                <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>