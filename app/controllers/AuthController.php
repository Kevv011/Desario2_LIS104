<?php
require_once 'app/models/AuthModel.php';

class AuthController
{
    public function registro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'app/views/registro.php';
        } else {
            // Recoger los datos del formulario
            $nombre_completo = trim($_POST['nombreCompleto']);
            $correo = trim($_POST['correo']);
            $telefono = trim($_POST['telefono']);
            $direccion = trim($_POST['direccion']);
            $codigo_postal = trim($_POST['codigoPostal']);

            // Variables para almacenar errores
            $errores = [];

            // Normalización y validaciones
            $nombre_completo = preg_replace('/\s+/', ' ', $nombre_completo);
            if (!preg_match("/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/", $nombre_completo)) {
                $errores[] = "El nombre completo solo debe contener letras, espacios y tildes.";
            }

            $correo = strtolower($correo);
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $errores[] = "El correo electrónico no es válido.";
            }

            if (!preg_match("/^(\d{10}|\d{3}-\d{3}-\d{4})$/", $telefono)) {
                $errores[] = "El número de teléfono debe tener 10 dígitos, con o sin guiones.";
            }

            $direccion = preg_replace('/[^A-Za-z0-9\s\.,]/', '', $direccion);
            if (!preg_match("/^[A-Za-z0-9\s\.,]+$/", $direccion)) {
                $errores[] = "La dirección solo debe contener letras, números, espacios, puntos y comas.";
            }

            if (!preg_match("/^\d{5}$/", $codigo_postal)) {
                $errores[] = "El código postal debe tener exactamente 5 dígitos numéricos.";
            }

            // Si hay errores, mostrar nuevamente el formulario con errores
            if (!empty($errores)) {
                echo "Hay errores presentes en la informacion";
            }

            // Guardar en la base de datos
            session_start();

            $model = new AuthModel();
            $exito = $model->guardarUsuario($nombre_completo, $correo, $telefono, $direccion, $codigo_postal);

            if ($exito) {
                // Guardar datos en sesión
                $_SESSION['usuario_registrado'] = [
                    'nombre' => $nombre_completo,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'direccion' => $direccion,
                    'cod_postal' => $codigo_postal
                ];

                // Redireccionar
                header("Location: /" . $_SESSION['rootFolder'] . "/Auth/mostrarDatos/");
                exit();
            } else {
                echo "Error al guardar los datos";
            }
        }
    }

    public function mostrarDatos()
    {
        session_start(); // Asegúrate de iniciar sesión
        $usuario = $_SESSION['usuario_registrado'] ?? null;

        if ($usuario) {
            require "app/views/resultadoRegistro.php";
            unset($_SESSION['usuario_registrado']);
        } else {
            echo "No hay datos para mostrar.";
        }
    }
}
