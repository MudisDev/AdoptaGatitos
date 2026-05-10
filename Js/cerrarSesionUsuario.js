import { usuario_cerrar_sesion } from "./urlConfig.js";

export const LogOut = () => {
  const button = document.querySelector("[data-boton-cerrar-sesion]");

  button.addEventListener("click", async () => {
    try {
      const response = await fetch(usuario_cerrar_sesion, {
        credentials: "include",
      });
      const data = await response.json();

      if (data.Success) {
        console.log("Sesion cerrada con exito");
        window.location.href = "../index.html";
      }

    } catch (error) {
      console.log("Error al cerrar sesion -> ", error);
    }
  });
};
