document.getElementById("loginForm").addEventListener("submit", function(event) {
  event.preventDefault();

  let email = document.getElementById("usuario").value.trim();
  let password = document.getElementById("password").value.trim();

  if (email === "" || password === "") {
    alert("⚠️ Por favor, completa todos los campos.");
    return;
  }

  // Aquí puedes validar contra tu base de datos o PHP
  if (email === "admin@vetcare.com" && password === "1234") {
    alert("✅ Bienvenido Admin!");
    window.location.href = "VentanaPrincipal.html";
  } else {
    alert("❌ Usuario o contraseña incorrectos.");
  }
});

document.getElementById("loginForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Evita que se envíe al login.php

  // Aquí puedes hacer validaciones rápidas (ejemplo: campos vacíos)
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (email && password) {
    // Redirige a la página principal
    window.location.href = "/Proyecto_Sistema_de_informacion/Vista/Pagina_principal.html";
  } else {
    alert("Por favor completa todos los campos.");
  }
});
