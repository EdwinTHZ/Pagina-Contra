// Animación extra de bienvenida con un "toast"
window.addEventListener("load", () => {
  const toast = document.createElement("div");
  toast.textContent = "🐾 Bienvenido a CatByte";
  toast.style.position = "fixed";
  toast.style.bottom = "20px";
  toast.style.right = "20px";
  toast.style.background = "linear-gradient(135deg, #8e2de2, #4a00e0)";
  toast.style.color = "#fff";
  toast.style.padding = "12px 20px";
  toast.style.borderRadius = "8px";
  toast.style.fontSize = "14px";
  toast.style.boxShadow = "0 0 15px rgba(187, 134, 252, 0.8)";
  toast.style.zIndex = "1000";
  toast.style.opacity = "0";
  toast.style.transition = "opacity 0.8s ease";

  document.body.appendChild(toast);

  // aparecer
  setTimeout(() => (toast.style.opacity = "1"), 300);
  // desaparecer
  setTimeout(() => {
    toast.style.opacity = "0";
    setTimeout(() => toast.remove(), 800);
  }, 4000);
});
