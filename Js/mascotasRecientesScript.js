import { mostrar_mascotas } from "/Js/urlConfig.js";

document.addEventListener("DOMContentLoaded", async function () {
  try {
    const response = await fetch(`${mostrar_mascotas}`);
    const data = await response.json(); // Convertir la respuesta a JSON

    // Ejemplo: Mostrar los datos en la página
    const contenedor = document.getElementById("mascotas-recientes");
    //contenedor.innerHTML = JSON.stringify(data, null, 2); // Mostrar JSON en pantalla
    const template = document.getElementById("template-gato");

    data.forEach((gato) => {
      const clone = template.content.cloneNode(true);

      const img = clone.querySelector(".gato-item-foto");
      const nombre = clone.querySelector(".nombre");
      const genero = clone.querySelector(".genero");
      const edad = clone.querySelector(".edad");
      const boton = clone.querySelector("button");

      const icono =
        gato.genero.toLowerCase() === "macho" ? "fas fa-mars" : "fas fa-venus";

      const color = gato.genero.toLowerCase() === "macho" ? "blue" : "pink";

      img.src = gato.foto;
      nombre.textContent = gato.nombre;

      //genero.textContent = gato.genero;
      genero.innerHTML = `
    <strong>Género:</strong> ${gato.genero}
    <i class="${icono}" style="color:${color}"></i>
  `;

      edad.innerHTML = `<strong>Edad:</strong> ${gato.edad}`;

      boton.addEventListener("click", () => {
        window.location.href = `perfil_gato.html?id_mascota=${gato.id_mascota}`;
      });

      contenedor.appendChild(clone);
    });
  } catch (error) {
    console.error("Error al obtener datos:", error);
  }
});

/* function cargarComponente() {
  fetch("Components/navbar.html") // Obtener el archivo HTML de la navbar
    .then((response) => response.text()) // Convertir la respuesta en texto
    .then((html) => {
      const contenedor = document.getElementById(
        "mascotas-recientes-container",
      ); // Contenedor donde va a insertarse la navbar
      contenedor.innerHTML = html; // Insertar el HTML de la navbar
    })
    .catch((error) => {
      console.error("Error al cargar la navbar:", error); // Manejo de errores
    });
} */

// Llamar a la función cuando el documento esté completamente cargado
/* document.addEventListener("DOMContentLoaded", cargarComponente);
 */
