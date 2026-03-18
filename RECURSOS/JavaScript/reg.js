// Validación de contraseñas con animación
document.getElementById("registroForm").addEventListener("submit", function(e) {
  const pass = document.getElementById("contrasena").value;
  const confirm = document.getElementById("confirmar").value;

  if (pass !== confirm) {
    e.preventDefault();
    alert("⚠️ Las contraseñas no coinciden. Intenta de nuevo.");
    
    // efecto de vibración si hay error
    const form = document.querySelector(".registro-contenedor");
    form.style.animation = "shake 0.3s";
    setTimeout(() => form.style.animation = "", 300);
  }
});

// Animación de vibración
const style = document.createElement("style");
style.innerHTML = `
@keyframes shake {
  0% { transform: translateX(0); }
  25% { transform: translateX(-5px); }
  50% { transform: translateX(5px); }
  75% { transform: translateX(-5px); }
  100% { transform: translateX(0); }
}`;
document.head.appendChild(style);

document.getElementById("registroForm").addEventListener("submit", function(event) {
  event.preventDefault(); // evita el envío real del formulario
  // Aquí podrías hacer validaciones antes de redirigir
  window.location.href = "/Proyecto_Sistema_de_informacion/Vista/Inicio_sesion.html";
});
