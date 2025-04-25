function cargarFooter() {
    fetch("Components/footer.html") // Obtener el archivo HTML del footer
      .then((response) => response.text()) // Convertir la respuesta en texto
      .then((html) => {
        const contenedor = document.getElementById("footerContainer"); // Contenedor donde va a insertarse la navbar
        contenedor.innerHTML = html; // Insertar el HTML de la navbar
      })
      .catch((error) => {
        console.error("Error al cargar el footer:", error); // Manejo de errores
      });
  }
  
  // Llamar a la función cuando el documento esté completamente cargado
  document.addEventListener("DOMContentLoaded", cargarFooter);