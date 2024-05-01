document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
  
    loginForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Evitar el envío del formulario por defecto
  
      // Obtener los valores de los campos de entrada
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
  
      // Realizar alguna validación básica de los campos (puedes añadir más validaciones según tus necesidades)
      if (username.trim() === '' || password.trim() === '') {
        alert('Por favor, completa todos los campos.');
        return;
      }
  
      // Enviar los datos al servidor para autenticación (simulado aquí)
      // Esto es solo un ejemplo, en un entorno real, esta lógica se haría en el servidor
      // Aquí, por simplicidad, simplemente compararemos los valores con datos simulados
      const fakeUsername = 'usuario';
      const fakePassword = 'contraseña';
  
      if (username === fakeUsername && password === fakePassword) {
        // Credenciales correctas, redirigir al usuario a la página principal
        window.location.href = 'index.html'; // Cambia 'index.html' por la URL de tu página principal
      } else {
        // Credenciales incorrectas, mostrar un mensaje de error
        alert('Nombre de usuario o contraseña incorrectos.');
      }
    });
  });
  