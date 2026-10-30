let panelConfig=document.getElementById("panel_config");
let panelSimulador=document.getElementById("panel_simulador");
let botonSimulacion=document.getElementsByClassName("btn_iniciar_simulacion");



const cambiarTab = (mostrarSimulador) => {
    

    if (mostrarSimulador) {
        panelConfig.classList.add("oculto");
        panelSimulador.classList.remove("panel_simulador");
    } else {
        panelConfig.classList.remove("oculto");
        panelSimulador.classList.add("panel_config"); 
    }
};

botonSimulacion.addEventListener('click', () => cambiarTab(true));
