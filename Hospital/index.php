<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital - Sistema de Tecnovigilancia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos adicionales para mejorar el formulario */
        .input-container {
            position: relative;
            margin-bottom: 25px;
        }
        
        .input-container i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #2e7d32;
            font-size: 18px;
        }
        
        .input-container input,
        .input-container textarea,
        .input-container select {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }
        
        .input-container input:focus,
        .input-container textarea:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
            outline: none;
        }
        
        .input-container textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .required-field::after {
            content: " *";
            color: #e53935;
        }
        
        .field-group {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .field-group h3 {
            color: #2e7d32;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 600;
        }

        .formulario-img img {
            max-width: 60%;
            border-radius: 20px;
            box-shadow: var(--box-shadow);
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE IXTAPALUCA</a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="imagenes/menu.png" class="menu-icono" alt="menu">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#instrucciones">Instrucciones</a></li>
                    <li><a href="#formulario">Formulario</a></li>
                </ul>
            </nav>
        </div>

        <div class="header-content container">
            <div class="header-txt">
                <h1>TECNOVIGILANCIA</h1>
                <p>
                    El propósito de la Tecnovigilancia es garantizar que los dispositivos médicos que se encuentran disponibles en el mercado funcionen de la manera indicada conforme a la intención de uso del fabricante y, en caso contrario, 
                    se tomen las acciones correspondientes para corregir y disminuir la probabilidad de recurrencia de los incidentes adversos. Con esto se busca mejorar la protección de la salud y seguridad de los usuarios de 
                    dispositivos médicos.
                </p>
                <p>
                    La evaluación del riesgo obtenida de los incidentes adversos reportados por los 
                    fabricantes, usuarios y/o operarios a la Secretaría de Salud permitirá disminuir la probabilidad de recurrencia 
                    o atender las consecuencias de dichos incidentes, por medio de la difusión de la información.
                </p>
                <a href="#formulario" class="btn-1">Reportar Incidente</a>
            </div>
            <div class="header-img">
                <img src="imagenes/ingeniera.jpg" alt="Dispositivos médicos">
            </div>
        </div>
    </header>

    <section id="instrucciones" class="about container">
        <div class="about-img">
            <img src="imagenes/ingenieros.jpg" alt="Personal médico">
        </div>
        <div class="about-txt">
            <h2>INSTRUCCIONES</h2>
            <p>
                ◦ Llenar el formulario de manera indicada y completa para completar correctamente la notificación.
            </p>
            <p>
                ◦ Si desconoces algún dato, escribe "NO DISPONIBLE".
            </p>
            <p>
                ◦ Es necesario que insertes una imagen como evidencia menor a 5 MB.
            </p>
            <br>
            <h3>NOTA IMPORTANTE:</h3>
            <p>
                ◦ Este formulario tiene un fin preventivo y de mejora en el uso seguro de dispositivos médicos.
            </p>
            <p>
                ◦ Notificar un incidente no implica culpabilidad, sino compromiso con la seguridad del paciente.
            </p>
            <p>
                ◦ Toda la información será tratada con confidencialidad.
            </p>
        </div>
    </section>

    <section id="formulario" class="formulario container">
        <form method="post" action="send.php" autocomplete="off" enctype="multipart/form-data" novalidate> 
            <h2>FORMULARIO DE NOTIFICACIÓN</h2>

            <!-- Información del Notificador -->
            <div class="field-group">
                <h3>Información del Notificador</h3>
                
                <div class="input-container">
                    <label for="nombre_notificador" class="required-field">Nombre de quien presenta la notificación</label>
                    <i class="fas fa-user"></i>
                    <input type="text" id="nombre_notificador" name="nombre_notificador" placeholder="Nombre completo" required>
                </div>
                
                <div class="input-container">
                    <label for="institucion" class="required-field">Institución</label>
                    <i class="fas fa-hospital"></i>
                    <input type="text" id="institucion" name="institucion" placeholder="Nombre de la institución" required>
                </div>
                
                <div class="input-container">
                    <label for="direccion" class="required-field">Dirección</label>
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" id="direccion" name="direccion" placeholder="Dirección completa" required>
                </div>
            </div>
            
            <!-- Información de Contacto -->
            <div class="field-group">
                <div class="input-container">
                    <label for="contacto" class="required-field">Número de teléfono o correo electrónico</label>
                    <i class="fas fa-phone"></i>
                    <input type="text" id="contacto" name="contacto" placeholder="Contacto" required>
                </div>
                
                <div class="input-container">
                    <label for="fecha_notificacion" class="required-field">Fecha de la notificación</label>
                    <i class="fas fa-calendar-alt"></i>
                    <input type="datetime-local" id="fecha_notificacion" name="fecha_notificacion" required>
                </div>
            </div>
            
            <!-- Razón social del fabricante y distribuidor -->
            <div class="field-group">
                <h3>Razón social del fabricante y distribuidor</h3>
                
                <div class="input-container">
                    <label for="nombre_fabricante">Nombre</label>
                    <i class="fas fa-industry"></i>
                    <input type="text" id="nombre_fabricante" name="nombre_fabricante" placeholder="Nombre del fabricante">
                </div>
                
                <div class="input-container">
                    <label for="direccion_fabricante">Dirección</label>
                    <i class="fas fa-map-marked-alt"></i>
                    <input type="text" id="direccion_fabricante" name="direccion_fabricante" placeholder="Dirección del fabricante">
                </div>
            </div>
            
            <!-- Datos del operador del dispositivo médico -->
            <div class="field-group">
                <h3>Datos del operador del dispositivo médico</h3>
                
                <div class="input-container">
                    <label for="nombre_operador">Nombre o iniciales</label>
                    <i class="fas fa-user-md"></i>
                    <input type="text" id="nombre_operador" name="nombre_operador" placeholder="Nombre del operador">
                </div>
                
                <div class="input-container">
                    <label for="direccion_operador">Dirección</label>
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" id="direccion_operador" name="direccion_operador" placeholder="Dirección del operador">
                </div>
            </div>
            
            <!-- Identificación del paciente -->
            <div class="field-group">
                <h3>Identificación del paciente</h3>
                
                <div class="input-container">
                    <label for="iniciales_paciente">Iniciales o clave del paciente</label>
                    <i class="fas fa-id-card"></i>
                    <input type="text" id="iniciales_paciente" name="iniciales_paciente" placeholder="Iniciales o clave">
                </div>
                
                <div class="input-container">
                    <label for="edad_paciente">Edad</label>
                    <i class="fas fa-birthday-cake"></i>
                    <input type="text" id="edad_paciente" name="edad_paciente" placeholder="Edad del paciente">
                </div>
                
                <div class="input-container">
                    <label for="sexo_paciente">Sexo</label>
                    <i class="fas fa-venus-mars"></i>
                    <select id="sexo_paciente" name="sexo_paciente">
                        <option value="">Seleccionar...</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                
                <div class="input-container">
                    <label for="lugar_incidente">Lugar del incidente</label>
                    <i class="fas fa-map-pin"></i>
                    <input type="text" id="lugar_incidente" name="lugar_incidente" placeholder="Lugar donde ocurrió el incidente">
                </div>
            </div>
            
            <!-- Información sobre el incidente adverso -->
            <div class="field-group">
                <h3>Información sobre el incidente adverso</h3>
                
                <div class="input-container">
                    <label for="descripcion_incidente">Descripción del incidente</label>
                    <i class="fas fa-file-alt"></i>
                    <textarea id="descripcion_incidente" name="descripcion_incidente" placeholder="Describa el incidente con detalle"></textarea>
                </div>
            </div>
            
            <!-- Identificación del dispositivo médico -->
            <div class="field-group">
                <h3>Identificación del dispositivo médico</h3>

                <div class="formulario-img">
                    <img src="imagenes/dispositivos.jpg" alt="Dispositivos">
                </div>
                
                <div class="input-container">
                    <label for="denominacion_dispositivo">Denominación distintiva del dispositivo</label>
                    <i class="fas fa-stethoscope"></i>
                    <input type="text" id="denominacion_dispositivo" name="denominacion_dispositivo" placeholder="Nombre del dispositivo">
                </div>
                
                <div class="input-container">
                    <label for="categoria_dispositivo">Categoría y clase del dispositivo médico</label>
                    <i class="fas fa-tags"></i>
                    <input type="text" id="categoria_dispositivo" name="categoria_dispositivo" placeholder="Categoría y clase">
                </div>
                
                <div class="input-container">
                    <label for="codigo_modelo">Código modelo o número de catálogo</label>
                    <i class="fas fa-barcode"></i>
                    <input type="text" id="codigo_modelo" name="codigo_modelo" placeholder="Código o número de catálogo">
                </div>
                
                <div class="input-container">
                    <label for="numero_serie">Número de serie o lote</label>
                    <i class="fas fa-hashtag"></i>
                    <input type="text" id="numero_serie" name="numero_serie" placeholder="Número de serie o lote">
                </div>
                
                <div class="input-container">
                    <label for="ubicacion_dispositivo">Ubicación y/o situación del Dispositivo Médico</label>
                    <i class="fas fa-location-arrow"></i>
                    <input type="text" id="ubicacion_dispositivo" name="ubicacion_dispositivo" placeholder="Ubicación del dispositivo">
                </div>
                
                <div class="input-container">
                    <label for="accesorios">Accesorios o dispositivos médicos asociados (si aplica)</label>
                    <i class="fas fa-puzzle-piece"></i>
                    <input type="text" id="accesorios" name="accesorios" placeholder="Accesorios relacionados">
                </div>
                
                <div class="input-container">
                    <label for="version_software">Versión del Software (si aplica)</label>
                    <i class="fas fa-code"></i>
                    <input type="text" id="version_software" name="version_software" placeholder="Versión del software">
                </div>
            </div>
            
            <!-- Medidas tomadas -->
            <div class="field-group">
                <h3>Medidas tomadas</h3>
                
                <div class="input-container">
                    <label for="medidas_tomadas">Medidas tomadas/acciones preventivas, correctivas y de seguridad</label>
                    <i class="fas fa-clipboard-check"></i>
                    <textarea id="medidas_tomadas" name="medidas_tomadas" placeholder="Describa las medidas tomadas"></textarea>
                </div>
            </div>
            
            <!-- Evidencia del incidente -->
            <div class="field-group">
                <h3>Evidencia del incidente</h3>
                
                <div class="input-container">
                    <label for="foto">Subir imagen o documento relacionado</label>
                    <i class="fas fa-file-upload"></i>
                    <input type="file" id="foto" name="foto" accept="image/*,.pdf,.doc,.docx">
                    <small>Formatos aceptados: JPG, PNG, PDF, DOC (Tamaño máximo: 5MB)</small>
                </div>
            </div>
                                    
            <div class="form-footer">
                <button type="submit" class="btn">Enviar Notificación</button>
                <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
            </div>
        </form>
    </section>

    <footer id="contacto" class="footer">
        <div class="footer-content container"> 
            <div class="link">
                <h3>Hospital Regional de Alta Especialidad de Ixtapaluca</h3>
                <p>Subdirección de Ingeniería Biomédica</p>
                <p>© 2025 Todos los derechos reservados</p>
            </div>
        
            <div class="link">
                <h3>Contacto</h3>
                <ul>
                    <li><i class="fas fa-phone"></i> Teléfono: 01(555) 97298000 Ext.1061</li>
                    <li><i class="fas fa-envelope"></i> Email: <br>hospitalregionalaltasespeciali@gmail.com <br>tecnovigilancia@hraei.gob.mx <br>hraeitecnovigilancia@gmail.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Dirección: Carretera Federal México-Puebla Km 34.5, Ixtapaluca Col. Pueblo de Zoquiapan</li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        // Validación básica del formulario antes de enviar
        document.querySelector('form').addEventListener('submit', function(e) {
            let valid = true;
            
            // Validar campos requeridos
            document.querySelectorAll('[required]').forEach(function(input) {
                if (!input.value.trim()) {
                    input.style.borderColor = '#e74c3c';
                    valid = false;
                    
                    // Hacer scroll al primer campo con error
                    if (valid === false) {
                        input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        input.focus();
                        valid = null; // Para evitar que se siga ejecutando
                    }
                } else {
                    input.style.borderColor = '';
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Por favor complete todos los campos obligatorios marcados con *');
            }
        });

        // Mejorar la experiencia de usuario en campos con errores
        document.querySelectorAll('[required]').forEach(function(input) {
            input.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.style.borderColor = '';
                }
            });
        });
    </script>
</body>
</html>