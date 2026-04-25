//const domain = `https://kuramadev.com/adopta_gatitos`;
const domain = `http://192.168.18.3`;
const php_domain = `${domain}/adopta-gatitos`;
export const api_ciudadano = `${php_domain}/api/ciudadano`;
export const ciudadano_iniciar_sesion = `${api_ciudadano}/iniciar_sesion.php`;

export const api_encargado  = `${php_domain}/api/encargado`;
export const encargado_iniciar_sesion = `${api_encargado}/iniciar_sesion_encargado.php`;
export const encargado_registrar_gato = `${api_encargado}/registrar_gato.php`;

export const api_gato  = `${php_domain}/api/gato`;
export const mostrar_gatos = `${api_gato}/mostrar_gatos.php`;
export const perfil_gato = `${api_gato}/perfil_gato.php`;

