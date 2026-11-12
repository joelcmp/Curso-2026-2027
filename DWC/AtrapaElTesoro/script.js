// Variables Vista
const cabecera = document.getElementById('cabecera');
const panelConfigurador = document.getElementById('panel-config');
const panelJuego = document.getElementById('panel-juego');
const escenario = document.getElementById('escenario');
const cestaDIV = document.getElementById('cesta');
const monedaDIV = document.getElementById('moneda');
const contenedorVelocidad = document.getElementById('spin_velocidad');
const contenedorObjetivo = document.getElementById('spin_objetivo');
const btn_iniciar = document.getElementById('btn_iniciar');
const btn_izquierda = document.getElementById('btn_izquierda');
const btn_derecha = document.getElementById('btn_derecha');
const btn_play = document.getElementById('btn_play');
const btn_stop = document.getElementById('btn_stop');
const btn_acelerar = document.getElementById('btn_acelerar');
const btn_frenar = document.getElementById('btn_frenar');
const btn_reiniciar = document.getElementById('btn_reiniciar');

// Constantes del escenario
const ANCHO_ESCENARIO = 600;
const ANCHO_CESTA = 50;
const ALTO_ESCENARIO = 450;
const ALTO_CESTA = 30;

// Variables Modelo
let objetivoMonedas;
let monedasRestantes;
let puntos = 0;
let atrapadas = 0;
let perdidas = 0;

let cestaX = 275; // Centrada
let monedaX = 0;
let monedaY = 0;
let velocidad = 30; 
let monedaCayendo = false;
let timerMoneda;
let timerCesta; // Por si queremos mover la cesta automáticamente (opcional)

// Primer arranque
panelConfigurador.style.display = 'block';
panelJuego.style.display = 'none';

btn_iniciar.addEventListener('click', prepararJuego);
btn_izquierda.addEventListener('click', moverIzquierda);
btn_derecha.addEventListener('click', moverDerecha);
btn_play.addEventListener('click', playJuego);
btn_stop.addEventListener('click', stopJuego);
btn_acelerar.addEventListener('click', acelerar);
btn_frenar.addEventListener('click', frenar);
btn_reiniciar.addEventListener('click', reiniciar);

// CONTROLES DE LA CESTA
function moverIzquierda() {
    cestaX -= 30;
    actualizarCesta();
}
function moverDerecha() {
    cestaX += 30;
    actualizarCesta();
}
function actualizarCesta() {
    if (cestaX < 0) cestaX = 0;
    if (cestaX > ANCHO_ESCENARIO - ANCHO_CESTA) cestaX = ANCHO_ESCENARIO - ANCHO_CESTA;
    cestaDIV.style.left = cestaX + 'px';
}

// TEMPORIZADORES
function playJuego() {
    clearInterval(timerMoneda);
    timerMoneda = setInterval(caerMoneda, velocidad);
    document.getElementById('mensaje').innerText = '¡A jugar!';
}
function stopJuego() {
    clearInterval(timerMoneda);
    document.getElementById('mensaje').innerText = 'Juego en pausa';
}
function acelerar() {
    if (velocidad > 10) velocidad -= 5;
    else velocidad = 10;
    if (monedaCayendo) playJuego(); // Reinicia el timer si está en marcha
}
function frenar() {
    if (velocidad < 100) velocidad += 5;
    else velocidad = 100;
    if (monedaCayendo) playJuego();
}

// LÓGICA DE LA MONEDA
function caerMoneda() {
    if (!monedaCayendo) {
        monedaX = Math.random() * (ANCHO_ESCENARIO - 20);
        monedaY = 0;
        monedaCayendo = true;
        monedaDIV.style.display = 'block';
        monedaDIV.style.left = monedaX + 'px';
        monedaDIV.style.top = monedaY + 'px';
    } else {
        monedaY += 5;
        monedaDIV.style.top = monedaY + 'px';

        // COLISIÓN EN 2 EJES
        if (monedaY >= ALTO_ESCENARIO - ALTO_CESTA - 20) { // Si llega a la altura de la cesta
            if (monedaX + 20 >= cestaX && monedaX <= cestaX + ANCHO_CESTA) {
                // ATRAPADA
                atrapadas++;
                puntos += 10;
                document.getElementById('mensaje').innerText = '¡Atrapada! +10';
                animarImpacto();
            } else {
                // PERDIDA
                perdidas++;
                document.getElementById('mensaje').innerText = 'Se escapó...';
            }
            terminarCaida();
        }
    }
}

function animarImpacto() {
    monedaDIV.classList.remove('atrapada');
    void monedaDIV.offsetWidth;
    monedaDIV.classList.add('atrapada');

    let flotante = document.createElement('span');
    flotante.className = 'punto-flotante';
    flotante.innerText = '+10';
    flotante.style.left = monedaX + 'px';
    flotante.style.top = monedaY + 'px';
    escenario.appendChild(flotante);
    
    setTimeout(function() {
        flotante.remove();
    }, 1000);
}

function terminarCaida() {
    clearInterval(timerMoneda);
    monedaCayendo = false;
    monedaDIV.style.display = 'none';
    monedasRestantes--;
    actualizarEstadisticas();

    if (monedasRestantes > 0) {
        // Esperar un poco antes de lanzar la siguiente
        setTimeout(function() {
            playJuego();
        }, 500);
    } else {
        document.getElementById('mensaje').innerText = 'Fin de la partida. Puntos: ' + puntos;
        btn_play.disabled = true;
    }
}

function actualizarEstadisticas() {
    document.getElementById('n_monedas').innerText = monedasRestantes;
    document.getElementById('n_puntos').innerText = puntos;
    document.getElementById('n_atrapadas').innerText = atrapadas;
    document.getElementById('n_perdidas').innerText = perdidas;
}

function prepararJuego() {
    let nivel = parseInt(contenedorVelocidad.value);
    objetivoMonedas = parseInt(contenedorObjetivo.value);
    
    if (isNaN(nivel) || nivel < 1 || nivel > 10) nivel = 5;
    if (isNaN(objetivoMonedas) || objetivoMonedas < 1) objetivoMonedas = 5;

    velocidad = 110 - nivel * 10;
    monedasRestantes = objetivoMonedas;
    puntos = 0;
    atrapadas = 0;
    perdidas = 0;
    cestaX = 275;
    monedaCayendo = false;

    monedaDIV.style.display = 'none';
    cestaDIV.style.left = cestaX + 'px';
    btn_play.disabled = false;
    document.getElementById('mensaje').innerText = '¡Pulsa Play!';

    panelConfigurador.style.display = 'none';
    cabecera.style.display = 'none';
    panelJuego.style.display = 'flex';

    actualizarEstadisticas();
    playJuego();
}

function reiniciar() {
    stopJuego();
    clearInterval(timerMoneda);
    panelJuego.style.display = 'none';
    panelConfigurador.style.display = 'block';
    cabecera.style.display = 'block';
    monedaCayendo = false;
}