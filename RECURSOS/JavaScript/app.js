function mostrarSeccion(id) {
  // Oculta todas las secciones
  document.querySelectorAll('.seccion').forEach(sec => {
    sec.classList.remove('activa');
  });

  // Muestra la sección seleccionada
  document.getElementById(id).classList.add('activa');
}
