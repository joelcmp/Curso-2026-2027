// Variables Vista
const cabecera = document.getElementById('cabecera');
const panelConfigurador = document.getElementById('panel-config');
const panelSimulador = document.getElementById('panel-simulador');
const tableroDIV = document.getElementById('tablero');
const contenedorM = document.getElementById('spin_anchura_bosque');
const contenedorN = document.getElementById('spin_altura_bosque');
const contenedorP = document.getElementById('spin_probabilidad_arbol');
const contenedorQ = document.getElementById('spin_probabilidad_incendio');
const btn_iniciar = document.getElementById('btn_iniciar_simulacion');
const btn_avanzar1 = document.getElementById('btn_avanzar1');
const btn_play = document.getElementById('btn_play');
const btn_stop = document.getElementById('btn_stop');
const btn_acelerar = document.getElementById('btn_acelerar');
const btn_frenar = document.getElementById('btn_frenar');

let tableroDOM;

//Variables Modelo
let M;
let N;
let P;
let Q;
let bosque;
let bosque_futuro;

let t=0;
let velocidad = 1000; //(En milisegundos)
let n_infertil = 0;
let n_fertil = 0;
let n_arbol = 0;
let n_fuego = 0;

//Primer arranque
panelConfigurador.style.display = 'block';
panelSimulador.style.display = 'none';

btn_iniciar.addEventListener('click',prepararTablero);
btn_avanzar1.addEventListener('click',avanzar1);
btn_play.addEventListener('click', playSimulacion);
btn_stop.addEventListener('click',stopSimulacion);
btn_acelerar.addEventListener('click',acelerar);
btn_frenar.addEventListener('click',frenar);

//TEMPORIZADORES
function playSimulacion(){
    timer = setInterval(avanzar1, velocidad);
}
function stopSimulacion(){
    clearInterval(timer);
}
function acelerar(){
    if(velocidad > 0)
        velocidad-=100;
        if(velocidad <=0)
           velocidad = 100;
    else
        velocidad = 100;
  stopSimulacion();
  playSimulacion();

}
function frenar(){
    if(velocidad < 3000)
        velocidad+=100;
    else
        velocidad = 3000;
    stopSimulacion();
    playSimulacion();
}

function pintarTablero() {
    n_infertil = 0;
    n_fertil = 0;
    n_arbol = 0;
    n_fuego = 0;

    tableroDOM = document.createElement('div');
    tableroDOM.className = 'tablero';

    for (let i = 0; i < M; i++){
        let filaDOM = document.createElement('div');
        filaDOM.className = 'fila';
        for(let j = 0; j < N; j++){
            let celdaDOM = document.createElement('div');
            
            if(bosque[i][j]== 0)
            {
                celdaDOM.className = 'celda celdaInfertil';
                n_infertil++;
            }
            if(bosque[i][j]== 1)
            {
                celdaDOM.className = 'celda celdaFertil';
                n_fertil++;
            }
            if(bosque[i][j]== 2)
            {
                celdaDOM.className = 'celda celdaArbol';
                n_arbol++;
            }
            if(bosque[i][j]== 3)
            {
                celdaDOM.className = 'celda celdaFuego';
                n_fuego++;
            }

            filaDOM.appendChild(celdaDOM);
        }
        tableroDOM.appendChild(filaDOM);
    }
    tableroDIV.replaceChildren(tableroDOM);
    ajustarTablero();
    //ACTUALIZAR ESTADISTICAS
    document.getElementById('tiempo').innerText = t;
    document.getElementById('n_infertil').innerText = n_infertil;
    document.getElementById('n_fertil').innerText = n_fertil;
    document.getElementById('n_arbol').innerText = n_arbol;
    document.getElementById('n_fuego').innerText = n_fuego;

}
function ajustarTablero() {
    if (!tableroDOM || M <= 0 || N <= 0) {
        return;
    }

    const estilos = getComputedStyle(tableroDIV);
    const anchoDisponible = tableroDIV.clientWidth
        - parseFloat(estilos.paddingLeft)
        - parseFloat(estilos.paddingRight);
    const altoDisponible = tableroDIV.clientHeight
        - parseFloat(estilos.paddingTop)
        - parseFloat(estilos.paddingBottom);
    const ladoCelda = Math.max(0, Math.min(
        80,
        (Math.min(800, anchoDisponible) - 4) / N,
        (altoDisponible - 4) / M
    ));

    tableroDOM.querySelectorAll('.celda').forEach(celda => {
        celda.style.width = `${ladoCelda}px`;
        celda.style.height = `${ladoCelda}px`;
    });
}
function prepararTablero() {
    //Variables Modelo
    M = parseInt(contenedorM.value);
    N = parseInt(contenedorN.value);
    P = parseFloat(contenedorP.value);
    Q = parseFloat(contenedorQ.value); 
    
    t = 0;

    bosque = new Array(M); //Tablero 
    for (let i = 0; i < M; i++){
        bosque[i] = new Array(N);
    }
    //Inicializamos el bosque con todas las casillas fértiles (1)
    for (let i = 0; i < M; i++){  
        for (let j = 0; j < N; j++){
            bosque[i][j] = 1;
            n_fertil = N*M;
        }
    }
    //Preparar a vacio el bosque futuro
    bosque_futuro = new Array(M); //Tablero 
    for (let i = 0; i < M; i++){
        bosque_futuro[i] = new Array(N);
    }
    panelConfigurador.style.display = 'none';
    cabecera.style.display = 'none';
    panelSimulador.style.display = 'flex';

    pintarTablero();
}
function avanzar1() {
    for(let i = 0; i < M; i++)
    {
        for(let j = 0;j < N; j++)
        {
            //SI EL ESTADO = FERTIL
            if(bosque[i][j] == 1)
            {
                //CALCULAR PROBABILIDAD (P) DE NACIMIENTO DE ARBOL
                if(Math.random(0,1) <= P)
                    bosque_futuro[i][j] = 2;
                else
                    bosque_futuro[i][j] = 1; 
            }
            if(bosque[i][j] == 2)
            {
                //PROPAGACION DEL FUEGO
                if(i + 1 < M && bosque[i+1][j] == 3)
                    bosque_futuro[i][j] = 3;
                if(i - 1 >= 0 && bosque[i-1][j] == 3)
                    bosque_futuro[i][j] = 3;
                if(j + 1 < N && bosque[i][j+1] == 3)
                    bosque_futuro[i][j] = 3;
                if(j - 1 >= 0 && bosque[i][j-1] == 3)
                    bosque_futuro[i][j] = 3;

                //CALCULAR PROBABILIDAD (Q) DE COMBUSTION
                if(Math.random(0,1) <= Q)
                    bosque_futuro[i][j] = 3;
            }
            if(bosque[i][j] == 0)
                bosque_futuro[i][j] = 1;
            if(bosque[i][j] == 3)
                bosque_futuro[i][j] = 0;
        }
    }
    //Machacar el bosque actual con los resultados del bosque futuro
    //BOSQUE <------ BOSQUE_FUTURO
    for(let i = 0; i < M; i++)
    {
        for(let j= 0;j < N; j++)
        {
            bosque[i][j] = bosque_futuro[i][j];
        }
    }
    t++;

    pintarTablero();

}
