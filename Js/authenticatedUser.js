export function authenticatedUser() {
  //window.addEventListener("DOMContentLoaded", () => {
  const user = JSON.parse(localStorage.getItem("authenticated user"));

  if (user) {
    // Muestra elementos solo para usuarios logueados
    //document.getElementById("usuarioNombre").textContent = `Bienvenido, ${usuario.nombre}`;
    //document.getElementById("contenidoPrivado").style.display = "block";
    console.log("Hola ", user);
    console.log("Hola ", user[0].nombre);
    return true;
  } else {
    // Redirige si no hay sesión o es anónimo
    //window.location.href = "login.html";
    console.log("Usuario no autentificado Bv");
    return false;
  }
  //});
}

//authenticatedUser();
