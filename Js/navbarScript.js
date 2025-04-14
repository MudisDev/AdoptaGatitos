function cargarNavbar() {
  fetch("Components/navbar.html") // Obtener el archivo HTML de la navbar
    .then((response) => response.text()) // Convertir la respuesta en texto
    .then((html) => {
      const contenedor = document.getElementById("navbarContainer"); // Contenedor donde va a insertarse la navbar
      contenedor.innerHTML = html; // Insertar el HTML de la navbar
    })
    .catch((error) => {
      console.error("Error al cargar la navbar:", error); // Manejo de errores
    });
}

// Llamar a la función cuando el documento esté completamente cargado
document.addEventListener("DOMContentLoaded", cargarNavbar);
