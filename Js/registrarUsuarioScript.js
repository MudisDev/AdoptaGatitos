import { usuario_registrar_cuenta } from "./urlConfig.js";

export function FormRegister() {
  const form = document.querySelector("[data-register-form]");
  const nombreInput = document.querySelector("[data-nombre]");
  const usernameInput = document.querySelector("[data-username-register]");
  const emailInput = document.querySelector("[data-email]");
  const passwordInput = document.querySelector("[data-password-register]");
  const telefonoInput = document.querySelector("[data-telefono]");
  const generoInput = document.querySelector("[data-genero]");
  const fotoPerfilInput = document.querySelector("[data-foto-perfil]");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const nombre = nombreInput.value;
    const username = usernameInput.value;
    const email = emailInput.value;
    const password = passwordInput.value;
    const telefono = telefonoInput.value;
    const genero = generoInput.value;
    const fotoPerfil = fotoPerfilInput.value;

    console.log(
      "Data de registro",
      nombre,
      username,
      email,
      password,
      telefono,
      genero,
      fotoPerfil,
    );

    Register(nombre, username, email, password, telefono, genero, fotoPerfil);
  });
}

const Register = async (
  nombre,
  username,
  email,
  password,
  telefono,
  genero,
  fotoPerfil,
) => {
  try {
    const response = await fetch(
      `${usuario_registrar_cuenta}?nombre=${nombre}&username=${username}&email=${email}&password=${password}&telefono=${telefono}&genero=${genero}&foto_perfil=${fotoPerfil}`,
      { credentials: "include" },
    );

    const data = await response.json();
    console.log("Respuesta de registro -> ", data);
  } catch (e) {
    console.log("Error al registrar cuenta de usuario -> ", e);
  }
};
