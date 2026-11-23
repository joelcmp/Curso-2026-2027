// Variables Vista
const cabecera = document.getElementById('cabecera');
const panelConfigurador = document.getElementById('panel-config');
const panelJuego = document.getElementById('panel-juego');
const escenario = document.getElementById('escenario');
const naveDIV = document.getElementById('naveEnemiga');
const laserDIV = document.getElementById('laser');
const canonDIV = document.getElementById('canon');
const contenedorDisparos = document.getElementById('spin_disparos');
const contenedorVelocidad = document.getElementById('spin_velocidad');
const btn_iniciar = document.getElementById('btn_iniciar');
const btn_disparar = document.getElementById('btn_disparar');
const btn_play = document.getElementById('btn_play');
const btn_stop = document.getElementById('btn_stop');
const btn_acelerar = document.getElementById('btn_acelerar');
const btn_frenar = document.getElementById('btn_frenar');
const btn_reiniciar = document.getElementById('btn_reiniciar');

// Constantes del escenario
const ANCHO_ESCENARIO = 600;
const ANCHO_NAVE = 60;
const ALTO_ESCENARIO = 450;
const Y_IMPACTO = 30; // Altura a la que está la nave

// Variables Modelo
let numDisparos;
let disparosRestantes;
let puntos = 0;
let aciertos = 0;
let fallos = 0;

let naveX = 0;
let naveDireccion = 1;
let velocidad = 30; 
let laserY = 50;
let laserVolando = false;
let impactoComprobado = false;

let timerNave;
let timerLaser;

// Primer arranque
panelConfigurador.style.display = 'block';
panelJuego.style.display = 'none';

btn_iniciar.addEventListener('click', prepararJuego);
btn_disparar.addEventListener('click', disparar);
btn_play.addEventListener('click', playNave);
btn_stop.addEventListener('click', stopNave);
btn_acelerar.addEventListener('click', acelerar);
btn_frenar.addEventListener('click', frenar);
btn_reiniciar.addEventListener('click', reiniciar);

// TEMPORIZADORES
function playNave() {
    clearInterval(timerNave);
    timerNave = setInterval(moverNave, velocidad);
}
function stopNave() {
    clearInterval(timerNave);
}
function acelerar() {
    if (velocidad > 10) velocidad -= 5;
    else velocidad = 10;
    playNave();
}
function frenar() {
    if (velocidad < 100) velocidad += 5;
    else velocidad = 100;
    playNave();
}

// ANIMACIONES
function moverNave() {
    naveX += 5 * naveDireccion;
    if (naveX >= ANCHO_ESCENARIO - ANCHO_NAVE) {
        naveX = ANCHO_ESCENARIO - ANCHO_NAVE;
        naveDireccion = -1;
    }
    if (naveX <= 0) {
        naveX = 0;
        naveDireccion = 1;
    }
    naveDIV.style.left = naveX + 'px';
}

function disparar() {
    if (laserVolando || disparosRestantes <= 0) return;

    laserVolando = true;
    impactoComprobado = false;
    disparosRestantes--;
    laserY = 50;
    laserDIV.style.bottom = laserY + 'px';
    laserDIV.style.display = 'block';
    btn_disparar.disabled = true;

    // Animación del cañón
    canonDIV.classList.remove('disparo');
    void canonDIV.offsetWidth; // TRUCO PARA REPETIR ANIMACIÓN
    canonDIV.classList.add('disparo');

    actualizarEstadisticas();
    timerLaser = setInterval(volarLaser, 10);
}

function volarLaser() {
    laserY += 8;
    laserDIV.style.bottom = laserY + 'px';

    // Colisión
    if (!impactoComprobado && laserY + 40 >= ALTO_ESCENARIO - Y_IMPACTO) {
        impactoComprobado = true;
        comprobarImpacto();
    }
    if (laserY > ALTO_ESCENARIO) {
        terminarVuelo();
    }
}

function comprobarImpacto() {
    let centroNave = naveX + ANCHO_NAVE / 2;
    let centroLaser = ANCHO_ESCENARIO / 2;
    let distancia = Math.abs(centroNave - centroLaser);
    let puntosTiro = 0;

    if (distancia <= 10) puntosTiro = 10;
    else if (distancia <= 25) puntosTiro = 5;
    else if (distancia <= 40) puntosTiro = 1;

    if (puntosTiro > 0) {
        aciertos++;
        puntos += puntosTiro;
        document.getElementById('mensaje').innerText = '¡Impacto! +' + puntosTiro;
        animarImpacto(puntosTiro);
        actualizarEstadisticas();
        terminarVuelo();
    } else {
        fallos++;
        document.getElementById('mensaje').innerText = 'Has fallado...';
        actualizarEstadisticas();
    }
}

function animarImpacto(puntosTiro) {
    naveDIV.classList.remove('impacto');
    void naveDIV.offsetWidth; // TRUCO
    naveDIV.classList.add('impacto');

    let flotante = document.createElement('span');
    flotante.className = 'punto-flotante';
    flotante.innerText = '+' + puntosTiro;
    flotante.style.left = (naveX + 15) + 'px';
    flotante.style.top = '30px';
    escenario.appendChild(flotante);
    
    setTimeout(function() {
        flotante.remove();
    }, 1000);
}

function terminarVuelo() {
    clearInterval(timerLaser);
    laserDIV.style.display = 'none';
    laserVolando = false;

    if (disparosRestantes > 0) {
        btn_disparar.disabled = false;
    } else {
        document.getElementById('mensaje').innerText = 'Fin de la partida. Puntos: ' + puntos;
        btn_disparar.disabled = true;
    }
}

function actualizarEstadisticas() {
    document.getElementById('n_disparos').innerText = disparosRestantes;
    document.getElementById('n_puntos').innerText = puntos;
    document.getElementById('n_aciertos').innerText = aciertos;
    document.getElementById('n_fallos').innerText = fallos;
}

function prepararJuego() {
    numDisparos = parseInt(contenedorDisparos.value);
    let nivel = parseInt(contenedorVelocidad.value);
    
    if (isNaN(numDisparos) || numDisparos < 1) numDisparos = 5;
    if (isNaN(nivel) || nivel < 1 || nivel > 10) nivel = 5;

    velocidad = 110 - nivel * 10;
    disparosRestantes = numDisparos;
    puntos = 0;
    aciertos = 0;
    fallos = 0;
    naveX = 0;
    naveDireccion = 1;
    laserVolando = false;

    laserDIV.style.display = 'none';
    naveDIV.style.left = '0px';
    btn_disparar.disabled = false;
    document.getElementById('mensaje').innerText = '¡Pulsa Disparar!';

    panelConfigurador.style.display = 'none';
    cabecera.style.display = 'none';
    panelJuego.style.display = 'flex';

    actualizarEstadisticas();
    playNave();
}

function reiniciar() {
    stopNave();
    clearInterval(timerLaser);
    panelJuego.style.display = 'none';
    panelConfigurador.style.display = 'block';
    cabecera.style.display = 'block';
}