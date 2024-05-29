<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 flex items-center justify-center h-screen">
    <div class="flex bg-green-300 rounded-lg shadow-lg" style="max-width: 1200px; width: 100%;">
        <!-- Imagen completa -->
        <div class="w-1/2">
            <img src="<?php echo constant('URL'); ?>public/img/loginSplash.png" alt="Splash Image" class="w-full h-full object-cover rounded-l-lg">
        </div>
        <!-- Formulario de inicio de sesión -->
        <div class="w-1/2 bg-white p-8 rounded-r-lg flex flex-col items-center justify-center">
            <div class="mb-4">
                <img src="<?php echo constant('URL'); ?>public/img/logo.png" alt="Logo" class="w-16 h-16">
            </div>
            <h2 class="text-2xl font-bold mb-4">Inicio de Sesión</h2>
            <p class="mb-4">Bienvenid@!</p>
            <div class="w-full mb-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <?php $this->showMessages(); ?>
                </div>
            </div>
            <form action="<?php echo constant('URL'); ?>login/authenticate" method="POST" class="w-64">
                <div class="mb-4">
                    <input type="number" id="worker_number" name="worker_number" placeholder="No. Trabajador" class="w-full p-2 border border-gray-300 rounded" minlength="8" maxlength="8" oninput="if(this.value.length > 8) this.value = this.value.slice(0, 8);" required>
                </div>
                <div class="mb-4 relative">
                    <input type="password" id="password" name="password" placeholder="Contraseña" class="w-full p-2 border border-gray-300 rounded" required>
                    <span class="absolute right-2 top-2 cursor-pointer" id="eye">👁️</span>
                </div>
                <div class="mb-4">
                    <a href="<?php echo constant('URL'); ?>recuperar" class="text-sm text-green-600">¿Olvidaste la Contraseña?</a>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white p-2 rounded">Iniciar Sesión</button>
            </form>
            <a href="<?php echo constant('URL'); ?>registro" class="text-sm text-green-600 mt-4">¿No tienes una cuenta?</a>
        </div>
    </div>
    <script>
        document.getElementById("eye").addEventListener('click', () => {
            const passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>
</body>
</html>
