let animales = [];

function registrarAnimal() {
    const nombre = document.getElementById('nombre').value;
    const especie = document.getElementById('especie').value;
    const edad = document.getElementById('edad').value;
    const salud = document.getElementById('salud').value;

    if (nombre && especie && edad && salud) {
        animales.push({ nombre, especie, edad, salud });
        mostrarAnimales();
        document.getElementById('animalForm').reset();
    } else {
        alert("Por favor completa todos los campos.");
    }
}

function mostrarAnimales() {
    const tabla = document.querySelector('#tablaAnimales tbody');
    tabla.innerHTML = "";

    animales.forEach(animal => {
        const fila = `<tr>
            <td>${animal.nombre}</td>
            <td>${animal.especie}</td>
            <td>${animal.edad}</td>
            <td>${animal.salud}</td>
        </tr>`;
        tabla.innerHTML += fila;
    });
}
