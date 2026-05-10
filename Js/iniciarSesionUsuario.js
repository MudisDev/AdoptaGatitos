import { usuario_iniciar_sesion } from "./urlConfig.js";

export function FormLogin() {
  const form = document.querySelector("[data-login-form]");
  const usernameInput = document.querySelector("[data-username]");
  const passwordInput = document.querySelector("[data-password]");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const username = usernameInput.value;
    const password = passwordInput.value;

    console.log(`user, pass -> ${username}, ${password}`);
    Login(username, password);
  });
}

const Login = async (username, password) => {
  try {
    const response = await fetch(
      `${usuario_iniciar_sesion}?username=${username}&password=${password}`,
      { credentials: "include" },
    );

    const data = await response.json();
    console.log("Data LogIn -> ", data);

    if (!data.Error) {
      window.location.reload();
    }
  } catch (e) {
    console.log("Error al iniciar sesion: ", e);
  }
};
