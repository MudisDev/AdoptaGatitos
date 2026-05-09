import { perfil_mascota } from "./urlConfig.js";

document.addEventListener("DOMContentLoaded", async function () {
  const params = new URLSearchParams(window.location.search);
  const id_mascota_perfil = params.get("id_mascota");
  if (!id_mascota_perfil) return;

  try {
    const response = await fetch(
      `${perfil_mascota}?id_mascota=${id_mascota_perfil}`,
    );
    const data = await response.json(); // Convertir la respuesta a JSON
    /* console.log("Data -> ", data); */

    // Ejemplo: Mostrar los datos en la página
    const contenedor = document.getElementById("perfil-mascota");
    //contenedor.innerHTML = JSON.stringify(data, null, 2); // Mostrar JSON en pantalla
    const template = document.getElementById("template-mascota-perfil");

    const clone = template.content.cloneNode(true);

    //convierte el objeto data en un array de arrays
    //debe coincidir el campo clave tanto en la BD como en el HTML
    Object.entries(data).forEach(([clave, valor]) => {
      const elemento = clone.querySelector(`[data-${clave}]`);

      if (elemento) {
        if (clave === "foto") {
          elemento.src = valor ?? "";
        } else {
          elemento.textContent = valor ?? "nulo";
        }
      }
    });

    contenedor.appendChild(clone);
  } catch (error) {
    console.error("Error al obtener datos:", error);
  }
});
