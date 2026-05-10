//const domain = `https://kuramadev.com/adopta_gatitos`;
const domain = `http://192.168.18.3`;
const php_domain = `${domain}/adopta-gatitos`;

export const api_usuario = `${php_domain}/api/usuario`;
export const usuario_iniciar_sesion = `${api_usuario}/iniciar_sesion.php`;
export const usuario_cerrar_sesion  = `${api_usuario}/cerrar_sesion.php`;

export const api_encargado  = `${php_domain}/api/encargado`;
export const encargado_iniciar_sesion = `${api_encargado}/iniciar_sesion_encargado.php`;
export const encargado_registrar_gato = `${api_encargado}/registrar_gato.php`;

export const api_mascota  = `${php_domain}/api/mascota`;
export const perfil_mascota = `${api_mascota}/perfil_mascota.php`;

export const api_lista = `${php_domain}/api/lista`;
export const mostrar_mascotas = `${api_lista}/mostrar_mascotas.php`;

export const utils = `${php_domain}/utils`;
export const check_auth = `${utils}/check_auth.php`;