const panelConfig = document.getElementById("panel_config");
const panelSimulador = document.getElementById("panel_simulador");
const botonSimulacion = document.getElementById("btn_iniciar");
const formConfig = document.getElementById("form_config");
const tablero = document.getElementById("tablero");

const fertil = 0;
const arbol = 1;
const fuego = 2;
const infertil = 3;


function cambiarTab(mostrarSimulador) {
    if (mostrarSimulador) {
        panelConfig.classList.add("oculto");
        panelSimulador.classList.remove("oculto");
    } else {
        panelConfig.classList.remove("oculto");
        panelSimulador.classList.add("oculto");
    }
}

function crearTablero(filas, columnas) {
    const fragmento = document.createDocumentFragment();
    let celdas = Array.from({ length: filas }, () => []);

    tablero.style.gridTemplateColumns = `repeat(${columnas}, 20px)`;


    for (let i = 0; i < filas; i++) {
        for (let j = 0; j < columnas; j++) {
            const celda = document.createElement("div");
            celda.classList.add("celda");
            fragmento.appendChild(celda);
            celdas[i][j]={
                celda,
                estado:0
            };
        }

    }


    tablero.appendChild(fragmento);
    return celdas;
}

formConfig.addEventListener("submit", (e) => {
    e.preventDefault();
});


const filas = Number(document.getElementById("filas").value);
const columnas = Number(document.getElementById("columnas").value);
const pNacimiento = Number(document.getElementById("p_nacimiento").value);
const pIncendio = Number(document.getElementById("p_incendio").value);

botonSimulacion.addEventListener("click", () => {
    if (!formConfig.reportValidity()) return;

    const filas = Number(document.getElementById("filas").value);
    const columnas = Number(document.getElementById("columnas").value);
    const pNacimiento = Number(document.getElementById("p_nacimiento").value);
    const pIncendio = Number(document.getElementById("p_incendio").value);

    if (
        !Number.isInteger(filas) ||
        !Number.isInteger(columnas) ||
        filas < 1 ||
        columnas < 1
    )

        window.simForestConfig = {
            filas,
            columnas,
            pNacimiento,
            pIncendio,
        };

    crearTablero(filas, columnas);
    cambiarTab(true);
});


function avanzar(pNacimiento,pIcendio,filas,columnas,celdas) {
    let pAleatoriaNacimiento=Math.random(0,1);
    let pAleatoriaIcendio=Math.random(0,1);
    let filaAleatoria=Math.random(0,filas);
    let columnaAleatoria=Math.random(0,columnas);

    if (celdas[filaAleatoria][columnaAleatoria].estado==0 && pAleatoriaNacimiento==pNacimiento) {
        celdas[filaAleatoria][columnaAleatoria].estado=1;
    }
    if (celdas[filaAleatoria][columnaAleatoria].estado==1 && pAleatoriaIncendio==pIcendio) {
        celdas[filaAleatoria][columnaAleatoria].estado=2;
    }
    if(celdas[filaAleatoria][columnaAleatoria].estado=2) {
        celdas[filaAleatoria][columnaAleatoria].estado=3;
    }
    if(celdas[filaAleatoria][columnaAleatoria].estado=3) {
        celdas[filaAleatoria][columnaAleatoria].estado=0;
    }




}