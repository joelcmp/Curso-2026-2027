const panelConfig = document.getElementById("panel_config");
const panelSimulador = document.getElementById("panel_simulador");
const botonSimulacion = document.getElementById("btn_iniciar");
const formConfig = document.getElementById("form_config");
const tablero = document.getElementById("tablero");
const avanzar = document.getElementById("avanzar");

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
      celda.classList.add("celda_fertil");
      fragmento.appendChild(celda);
      celdas[i][j] = {
        celda,
        estado: 0,
      };
    }
  }

  tablero.appendChild(fragmento);
  return celdas;
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
  const celdas = crearTablero(filas, columnas);

  window.simForestConfig = {
    filas,
    columnas,
    pNacimiento,
    pIncendio,
    celdas,
  };

  cambiarTab(true);
});

avanzar.addEventListener("click", () => {
  let pAleatoriaNacimiento = Math.random(0, 1);
  let pAleatoriaIcendio = Math.random(0, 1);
  let filaAleatoria = Math.random(0, window.simForestConfig.filas);
  let columnaAleatoria = Math.random(0, window.simForestConfig.columnas);

  if (
    window.simForestConfig.celdas[filaAleatoria][columnaAleatoria].estado ==
      0 &&
    pAleatoriaNacimiento == window.simForestConfig.pNacimiento
  ) {
    window.simForestConfig.celdas[filaAleatoria][columnaAleatoria].estado = 1;
    celda.classList.remove("celda_fertil");
    celda.classList.add("celda_nacimiento");
  }
  if (
    (window.simForestConfig.celdas[filaAleatoria][columnaAleatoria].estado ==
      1 &&
      pAleatoriaIncendio == window.simForestConfig.pIncendio) ||
    window.simForestConfig.celdas[filaAleatoria - 1][columnaAleatoria] == 1 ||
    window.simForestConfig.celdas[filaAleatoria + 1][columnaAleatoria] == 1 ||
    window.simForestConfig.celdas[filaAleatoria][columnaAleatoria - 1] == 1 ||
    window.simForestConfig.celdas[filaAleatoria][columnaAleatoria + 1]
  ) {
    window.simForestConfig.celdas[filaAleatoria][columnaAleatoria].estado = 2;
    celda.classList.remove("celda_nacimiento");
    celda.classList.add("celda_fuego");
  }
  if (
    (window.simForestConfig.celdas[filaAleatoria][columnaAleatoria].estado = 2)
  ) {
    window.simForestConfig.celdas[filaAleatoria][columnaAleatoria].estado = 3;
    celda.classList.remove("celda_fuego");
    celda.classList.add("celda_infertil");
  }
  if (
    (window.simForestConfig.celdas[filaAleatoria][columnaAleatoria].estado = 3)
  ) {
    window.simForestConfig.celdas[filaAleatoria][columnaAleatoria].estado = 0;
    celda.classList.remove("celda_infertil");
    celda.classList.add("celda_fertil");
  }
});
