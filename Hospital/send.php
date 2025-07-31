<?php
require 'conexion.php';

// Configuración para archivos
$uploadDir = 'uploads/';
$allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
$maxFileSize = 5 * 1024 * 1024; // 5MB

// Crear directorio si no existe
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inicializar variables para archivos
    $nombre_archivo = null;
    $ruta_archivo = null;

    // Procesar archivo adjunto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['foto'];
        
        // Validar tipo de archivo
        if (in_array($file['type'], $allowedTypes)) {
            // Validar tamaño
            if ($file['size'] <= $maxFileSize) {
                // Generar nombre único
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $newFileName = uniqid() . '.' . $extension;
                $destPath = $uploadDir . $newFileName;
                
                // Mover archivo
                if (move_uploaded_file($file['tmp_name'], $destPath)) {
                    $nombre_archivo = $file['name'];
                    $ruta_archivo = $destPath;
                } else {
                    $_SESSION['error'] = "Error al mover el archivo";
                }
            } else {
                $_SESSION['error'] = "El archivo excede el tamaño máximo de 5MB";
            }
        } else {
            $_SESSION['error'] = "Tipo de archivo no permitido";
        }
    }

    try {
        // Preparar consulta SQL
        $stmt = $conn->prepare("INSERT INTO notificaciones (
            nombre_notificador, institucion, direccion, contacto,
            fecha_notificacion, nombre_fabricante, direccion_fabricante,
            nombre_operador, direccion_operador, iniciales_paciente,
            edad_paciente, sexo_paciente, lugar_incidente,
            descripcion_incidente, denominacion_dispositivo,
            categoria_dispositivo, codigo_modelo, numero_serie,
            ubicacion_dispositivo, accesorios, version_software,
            medidas_tomadas, nombre_archivo, ruta_archivo
        ) VALUES (
            :nombre, :institucion, :direccion, :contacto,
            :fecha_notificacion, :fabricante, :dir_fabricante,
            :operador, :dir_operador, :iniciales,
            :edad, :sexo, :lugar,
            :descripcion, :dispositivo, :categoria,
            :modelo, :serie, :ubicacion, :accesorios,
            :version, :medidas, :nombre_archivo, :ruta_archivo
        )");

        // Asignar valores
        $stmt->bindParam(':nombre', $_POST['nombre_notificador']);
        $stmt->bindParam(':institucion', $_POST['institucion']);
        $stmt->bindParam(':direccion', $_POST['direccion']);
        $stmt->bindParam(':contacto', $_POST['contacto']);
        $stmt->bindParam(':fecha_notificacion', $_POST['fecha_notificacion']);
        $stmt->bindParam(':fabricante', $_POST['nombre_fabricante']);
        $stmt->bindParam(':dir_fabricante', $_POST['direccion_fabricante']);
        $stmt->bindParam(':operador', $_POST['nombre_operador']);
        $stmt->bindParam(':dir_operador', $_POST['direccion_operador']);
        $stmt->bindParam(':iniciales', $_POST['iniciales_paciente']);
        $stmt->bindParam(':edad', $_POST['edad_paciente']);
        $stmt->bindParam(':sexo', $_POST['sexo_paciente']);
        $stmt->bindParam(':lugar', $_POST['lugar_incidente']);
        $stmt->bindParam(':descripcion', $_POST['descripcion_incidente']);
        $stmt->bindParam(':dispositivo', $_POST['denominacion_dispositivo']);
        $stmt->bindParam(':categoria', $_POST['categoria_dispositivo']);
        $stmt->bindParam(':modelo', $_POST['codigo_modelo']);
        $stmt->bindParam(':serie', $_POST['numero_serie']);
        $stmt->bindParam(':ubicacion', $_POST['ubicacion_dispositivo']);
        $stmt->bindParam(':accesorios', $_POST['accesorios']);
        $stmt->bindParam(':version', $_POST['version_software']);
        $stmt->bindParam(':medidas', $_POST['medidas_tomadas']);
        $stmt->bindParam(':nombre_archivo', $nombre_archivo);
        $stmt->bindParam(':ruta_archivo', $ruta_archivo);

        // Ejecutar consulta
        if ($stmt->execute()) {
            $_SESSION['success'] = "Registro guardado correctamente!";
        } else {
            $_SESSION['error'] = "Error al guardar el registro";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error de base de datos: " . $e->getMessage();
    }
    
    // Redireccionar
    header('Location: index.php');
    exit();
}
?>