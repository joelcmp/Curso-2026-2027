// Variables Vista
const cabecera = document.getElementById('cabecera');
const panelConfigurador = document.getElementById('panel-config');
const panelJuego = document.getElementById('panel-juego');
const escenario = document.getElementById('escenario');
const naveDIV = document.getElementById('nave');
const meteoritoDIV = document.getElementById('meteorito');
const contenedorVelocidad = document.getElementById('spin_velocidad');
// [HUECO 3 CORREGIDO] Unificamos el nombre a contenedorVidas para seguir la lógica del profe
const contenedorVidas = document.getElementById('spin_vidas'); 

const btn_iniciar = document.getElementById('btn_iniciar');
const btn_play = document.getElementById('btn_play');
const btn_stop = document.getElementById('btn_stop');
const btn_acelerar = document.getElementById('btn_acelerar');
const btn_frenar = document.getElementById('btn_frenar');
const btn_reiniciar = document.getElementById('btn_reiniciar');

// Constantes del escenario
const ANCHO_ESCENARIO = 600;
const ANCHO_NAVE = 50;
const ALTO_ESCENARIO = 450;

// Variables Modelo
let vidasRestantes;
let puntos = 0;
let naveX = 275;
let meteoritoX = 0;
let meteoritoY = 0;
let velocidad = 30;
let meteoritoCayendo = false;
let timerMeteorito;
let timerSpawn; // Variable extra para el setTimeout de reaparición

panelConfigurador.style.display = 'block';
panelJuego.style.display = 'none';

btn_iniciar.addEventListener('click', prepararJuego);
btn_play.addEventListener('click', playJuego);
btn_stop.addEventListener('click', stopJuego);
btn_acelerar.addEventListener('click', acelerar);
btn_frenar.addEventListener('click', frenar);
btn_reiniciar.addEventListener('click', reiniciar);

// [HUECO 4 CORREGIDO] Control de la nave con el teclado
document.addEventListener('keydown', function(evento) {
    if (evento.key === 'ArrowLeft') {
        naveX -= 20;
    } else if (evento.key === 'ArrowRight') {
        naveX += 20;
    }
    // Comprobar límites del escenario
    if (naveX < 0) naveX = 0;
    if (naveX > ANCHO_ESCENARIO - ANCHO_NAVE) naveX = ANCHO_ESCENARIO - ANCHO_NAVE;
    
    naveDIV.style.left = naveX + 'px';
});

function playJuego() {
    clearInterval(timerMeteorito);
    timerMeteorito = setInterval(caerMeteorito, velocidad);
}
function stopJuego() {
    clearInterval(timerMeteorito);
}

function acelerar() {
    if (velocidad > 10) velocidad -= 5;
    else velocidad = 10;
    playJuego();
}
function frenar() {
    if (velocidad < 100) velocidad += 5;
    else velocidad = 100;
    playJuego();
}

function caerMeteorito() {
    if (!meteoritoCayendo) {
        // [HUECO 5 CORREGIDO] Inicialización del meteorito
        meteoritoX = Math.random() * (ANCHO_ESCENARIO - 30);
        meteoritoY = -30;
        meteoritoCayendo = true;
        meteoritoDIV.style.left = meteoritoX + 'px';
        meteoritoDIV.style.top = meteoritoY + 'px';
        meteoritoDIV.style.display = 'block';
    } else {
        meteoritoY += 5;
        meteoritoDIV.style.top = meteoritoY + 'px';

        // [HUECO 6 CORREGIDO] Lógica de colisión
        if (meteoritoY >= 400) {
            // Si la X del meteorito está dentro del rango de la nave
            if (meteoritoX >= naveX && meteoritoX <= naveX + ANCHO_NAVE) {
                vidasRestantes--;
                animarImpacto();
                actualizarEstadisticas();
            } else {
                puntos += 10;
                actualizarEstadisticas();
            }
            terminarCaida();
        }
    }
}

function animarImpacto() {
    meteoritoDIV.classList.remove('impacto');
    void meteoritoDIV.offsetWidth;
    meteoritoDIV.classList.add('impacto');
}

function terminarCaida() {
    clearInterval(timerMeteorito);
    meteoritoCayendo = false;
    meteoritoDIV.style.display = 'none';

    if (vidasRestantes > 0) {
        // [HUECO 7 CORREGIDO] Reaparición tras 500ms
        timerSpawn = setTimeout(playJuego, 500);
    } else {
        document.getElementById('mensaje').innerText = '¡Nave destruida! Puntos: ' + puntos;
        btn_play.disabled = true;
        btn_stop.disabled = true;
    }
}

function actualizarEstadisticas() {
    document.getElementById('n_vidas').innerText = vidasRestantes;
    document.getElementById('n_puntos').innerText = puntos;
}

function prepararJuego() {
    let nivel = parseInt(contenedorVelocidad.value);
    vidasRestantes = parseInt(contenedorVidas.value); 

    // [HUECO 8 CORREGIDO] Validación de inputs
    if (isNaN(vidasRestantes) || vidasRestantes < 1) {
        vidasRestantes = 3;
    }
    if (isNaN(nivel) || nivel < 1 || nivel > 10) {
        nivel = 5;
    }

    velocidad = 110 - nivel * 10;
    puntos = 0;
    naveX = 275;
    meteoritoCayendo = false;

    meteoritoDIV.style.display = 'none';
    naveDIV.style.left = naveX + 'px';
    
    btn_play.disabled = false;
    btn_stop.disabled = false;

    panelConfigurador.style.display = 'none';
    cabecera.style.display = 'none';
    panelJuego.style.display = 'flex';

    actualizarEstadisticas();
    playJuego();
}

function reiniciar() {
    stopJuego();
    clearTimeout(timerSpawn); // Limpiamos también el timeout de reaparición
    meteoritoCayendo = false;
    panelJuego.style.display = 'none';
    panelConfigurador.style.display = 'block';
    cabecera.style.display = 'block';
}