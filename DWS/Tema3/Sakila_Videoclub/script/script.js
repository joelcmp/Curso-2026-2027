const btnLogin = document.getElementById('panel-login');
const btnRegistro = document.getElementById('panel-registro');
const divLogin = document.getElementById('login');
const divRegistro = document.getElementById('registro');

divRegistro.style.display = 'none';

btnLogin.addEventListener('click', () => {
    divLogin.style.display = 'block';
    divRegistro.style.display = 'none';
});

btnRegistro.addEventListener('click', () => {
    divRegistro.style.display = 'block';
    divLogin.style.display = 'none';
});