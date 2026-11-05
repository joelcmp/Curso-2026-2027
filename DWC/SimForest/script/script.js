const panelConfig = document.getElementById("panel_config");
const panelSimulador = document.getElementById("panel_simulador");
const botonSimulacion = document.getElementById("btn_iniciar");
const formConfig = document.getElementById("form_config");
const tablero = document.getElementById("tablero");

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
    tablero.innerHTML = "";
    tablero.style.gridTemplateColumns = `repeat(${columnas}, 20px)`;

    const fragmento = document.createDocumentFragment();

    for (let i = 0; i < filas * columnas; i++) {
        const celda = document.createElement("div");
        celda.classList.add("celda");
        fragmento.appendChild(celda);
    }

    tablero.appendChild(fragmento);
}

formConfig.addEventListener("submit", (e) => {
    e.preventDefault();
});

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
    ) {
        alert("Las filas y columnas deben ser números enteros mayores que 0.");
        return;
    }

    if (
        pNacimiento < 0 ||
        pNacimiento > 1 ||
        pIncendio < 0 ||
        pIncendio > 1
    ) {
        alert("Las probabilidades deben estar entre 0 y 1.");
        return;
    }

    window.simForestConfig = {
        filas,
        columnas,
        pNacimiento,
        pIncendio,
    };

    crearTablero(filas, columnas);
    cambiarTab(true);
});