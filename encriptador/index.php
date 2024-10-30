<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de contraseñas</title>
    <style>
        /* Agregué estilos para el modal y la página */
        body {
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            text-align: center;
        }

        .fw-bold {
            font-weight: bold;
            color: #3287EC;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mb-5 {
            margin-bottom: 3rem;
        }

        .p-4 {
            padding: 1.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.50rem 1.25rem;
            font-size: 0.75rem;
            line-height: 1.5;
            border-radius: 1rem;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004080;
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border: 1px solid #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-outline-secondary {
            color: #6c757d;
            border: 1px solid #6c757d;
            background-color: transparent;
        }

        .btn-outline-secondary:hover {
            color: #495057;
            border-color: #495057;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 1.25rem;
            cursor: pointer;
            color: #6c757d;
            margin-left: auto;
            display: block;
        }

        .btn-close:hover {
            color: #495057;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-dialog {
            max-width: 500px;
            margin: 1.75rem auto;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 0.375rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .modal-header {
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            align-items: center;
        }

        .modal-body {
            padding: 1rem;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 500;
            margin: 0;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .text-primary {
            font-size: 40px;
            color: #007bff;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 0.5rem;
            font-size: 0.75rem;
            line-height: 1.5;
            border: 1px solid #ced4da;
            border-radius: 1rem;
            box-sizing: border-box;
            margin-top: 0.25rem;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Contenedor del título -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                </svg><br>
                LLAVERO DE CONTRASEÑAS
            </h2>
        </div>

        <!-- Contenedor del formulario -->
        <div class="p-4">
            <!-- Preguntas fuera del modal -->
            <form id="formulario">
                <div class="mb-3">
                    <label for="zorro">Usuario:</label>
                    <input type="text" id="zorro" name="zorro">
                </div>
                <div class="mb-3">
                    <label for="gato">Correo o teléfono:</label>
                    <input type="text" id="gato" name="gato">
                </div>
                <div class="mb-3">
                    <label for="oveja">Contraseña:</label>
                    <input type="text" id="oveja" name="oveja">
                </div>

                <!-- Botón para abrir el modal -->
                <button type="button" class="btn btn-primary w-50" onclick="abrirModal()">Crear Contraseña</button>
            </form>

            <div id="modal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Generar Contraseña</h5>
                            <button type="button" class="btn-close" onclick="cerrarModal()">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="formGenerarContrasena">
                                <div class="mb-3">
                                    <label for="word">Ingresa una palabra (opcional, máximo 15 letras):</label>
                                    <input type="text" id="word" name="word" maxlength="15">
                                </div>
                                <div class="mb-3">
                                    <label for="length">Longitud de la contraseña:</label>
                                    <input type="number" id="length" name="length" min="8" max="64" value="12" required>
                                </div>
                                <div class="mb-3">
                                    <label><input type="checkbox" id="includeSpecialChars"> Quitar caracteres especiales</label>
                                </div>
                                <div class="mb-3">
                                    <label><input type="checkbox" id="includeNumbers"> Quitar números </label>
                                </div>
                                <button type="button" class="btn btn-success w-100" onclick="generarContrasena()">Generar</button>
                            </form>

                            <div id="resultado" class="mt-3 text-center" style="display: none;">
                                <strong>Contraseña generada:</strong> <br>
                                <strong id="password" class="text-primary"></strong>
                                <br><br>
                                <button class='btn btn-outline-secondary mt-1 w-100' onclick='copiarAlPortapapeles()'>Copiar Contraseña</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function abrirModal() {
            document.getElementById("modal").style.display = "flex";
        }

        function cerrarModal() {
            document.getElementById("modal").style.display = "none";
        }

        function generarContrasena() {
            var palabra = document.getElementById("word").value;
            var longitud = parseInt(document.getElementById("length").value);
            var incluirNumeros = document.getElementById("includeNumbers").checked;
            var incluirCaracteresEspeciales = document.getElementById("includeSpecialChars").checked;
            var caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var caracteresEspeciales = '!@#$%^&*()';
            var numeros = '0123456789';
            var resultadoArray = [];
            var longitud_palabra = palabra.length;

            // Determinar los caracteres que se incluirán
            if (incluirCaracteresEspeciales) {
                caracteres = caracteres.replace(/[!@#$%^&*()]/g, ''); // Elimina caracteres especiales
            }
            if (incluirNumeros) {
                caracteres = caracteres.replace(/[0-9]/g, ''); // Elimina números
            }

            // Asegurar la inclusión de al menos un número y un carácter especial si están permitidos
            if (!incluirNumeros) {
                resultadoArray.push(numeros.charAt(Math.floor(Math.random() * numeros.length)));
            }
            if (!incluirCaracteresEspeciales) {
                resultadoArray.push(caracteresEspeciales.charAt(Math.floor(Math.random() * caracteresEspeciales.length)));
            }

            // Generar el resto de la contraseña
            while (resultadoArray.length < longitud) {
                if (palabra && resultadoArray.length < longitud_palabra && Math.random() > 0.5) {
                    var caracter = palabra.charAt(Math.floor(Math.random() * longitud_palabra));
                    caracter = Math.random() > 0.5 ? caracter.toUpperCase() : caracter.toLowerCase();
                    resultadoArray.push(caracter);
                } else {
                    var caracter = caracteres.charAt(Math.floor(Math.random() * caracteres.length));
                    resultadoArray.push(caracter);
                }
            }

            // Mezclar el array para asegurar que los caracteres añadidos no estén al principio
            resultadoArray = resultadoArray.sort(() => Math.random() - 0.5);

            // Convertir el array a cadena
            var resultado = resultadoArray.join('');

            document.getElementById("password").innerText = resultado;
            document.getElementById("resultado").style.display = "block";
        }
        
        function copiarAlPortapapeles() {
            var passwordElement = document.getElementById("password");
            var password = passwordElement.innerText;

            var tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = password;
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            alert("¡Contraseña copiada al portapapeles!");
        }
    </script>

</body>

</html>
