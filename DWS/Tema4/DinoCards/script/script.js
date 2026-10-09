const loginTab = document.getElementById('login');
const registroTab = document.getElementById('registro');
const botonLogin = document.getElementById('boton-login');
const botonRegistro = document.getElementById('boton-registro');
const enlaceRegistro = document.getElementById('enlace-registro');
const tarjeta = document.getElementById('login-registro');

const cambiarTab = (mostrarLogin) => {
    const alturaActual = tarjeta.offsetHeight;
    
    if (mostrarLogin) {
        loginTab.classList.remove('oculto');
        registroTab.classList.add('oculto');
        botonLogin.classList.add('activo');
        botonRegistro.classList.remove('activo');
    } else {
        registroTab.classList.remove('oculto');
        loginTab.classList.add('oculto');
        botonRegistro.classList.add('activo');
        botonLogin.classList.remove('activo');
    }
    
    const nuevaAltura = tarjeta.offsetHeight;
    
    tarjeta.style.height = alturaActual + 'px';
    tarjeta.offsetHeight;
    tarjeta.style.height = nuevaAltura + 'px';
    
    setTimeout(() => {
        tarjeta.style.height = '';
    }, 300);
};

botonLogin.addEventListener('click', () => cambiarTab(true));
botonRegistro.addEventListener('click', () => cambiarTab(false));
enlaceRegistro.addEventListener('click', () => cambiarTab(false));