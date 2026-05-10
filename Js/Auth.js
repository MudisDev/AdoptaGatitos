import { LogOut } from "./cerrarSesionUsuario.js";
import { FormLogin } from "./iniciarSesionUsuario.js";
import { FormRegister } from "./registrarUsuarioScript.js";
import { check_auth } from "/Js/urlConfig.js";

document.addEventListener("DOMContentLoaded", async function () {
  try {
    const response = await fetch(check_auth, {
      method: "GET",
      credentials: "include",
    });
    const data = await response.json(); // Convertir la respuesta a JSON
    console.log("Data de inicio de sesion ", data);

    if (!data.Success) {
      CargarFormularios();
    } else {
      CargarCerrarSesion();
    }
  } catch (error) {
    console.error("Error al consultar inicio de sesion del usuario:", error);
  }
});

function CargarFormularios() {
  // Ejemplo: Mostrar los datos en la página
  const container = document.getElementById("contenedor-formulario");
  //contenedor.innerHTML = JSON.stringify(data, null, 2); // Mostrar JSON en pantalla

  const templateLogin = document
    .getElementById("formulario-inicio-sesion-usuario")
    .content.cloneNode(true);
  const templateRegister = document
    .getElementById("formulario-registro-usuario")
    .content.cloneNode(true);

  container.appendChild(templateLogin);
  container.appendChild(templateRegister);

  FormLogin();
  FormRegister();
}

function CargarCerrarSesion() {
  const container = document.getElementById("contenedor-cerrar-sesion");

  const templateLogout = document
    .getElementById("template-cerrar-sesion")
    .content.cloneNode(true);

  container.appendChild(templateLogout);
  LogOut();
}
