<?php
// Asegurarse de que la sesión está iniciada
session_start();

// Obtener los datos del usuario desde la sesión
$usuario = $_SESSION['usuario_registrado'] ?? null;

// Verificar si hay datos para mostrar
if (!$usuario) {
    echo "<p class='text-danger'>No hay datos para mostrar.</p>";
    exit();
}

// Comprobar si hay advertencia en la dirección
$advertencia = '';
if (preg_match('/\b(calle|avenida|barrio)\b/i', $usuario['direccion'])) {
    $advertencia = "Advertencia: La dirección contiene una palabra clave como 'calle', 'avenida' o 'barrio'.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Exitoso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">¡Registro exitoso!</h4>
            </div>
            <div class="card-body">
                <p class="mb-3">Los datos se han almacenado correctamente en el sistema.</p>

                <?php if ($advertencia): ?>
                    <div class="alert alert-warning">
                        <?= htmlspecialchars($advertencia) ?>
                    </div>
                <?php endif; ?>

                <ul class="list-group">
                    <li class="list-group-item"><strong>Nombre Completo:</strong> <?= htmlspecialchars($usuario['nombre']) ?></li>
                    <li class="list-group-item"><strong>Correo Electrónico:</strong> <?= htmlspecialchars($usuario['correo']) ?></li>
                    <li class="list-group-item"><strong>Teléfono:</strong> <?= htmlspecialchars($usuario['telefono']) ?></li>
                    <li class="list-group-item"><strong>Dirección:</strong> <?= htmlspecialchars($usuario['direccion']) ?></li>
                    <li class="list-group-item"><strong>Código Postal:</strong> <?= htmlspecialchars($usuario['cod_postal']) ?></li>
                </ul>
            </div>
            <div class="card-footer text-end">
                <a href="/<?= $_SESSION['rootFolder'] ?>/Auth/registro" class="btn btn-primary">Registrar otro</a>
            </div>
        </div>
    </div>

</body>

</html>
