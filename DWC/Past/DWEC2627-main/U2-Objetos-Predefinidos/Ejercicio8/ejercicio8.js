function comprobarFecha() {
    let fecha = document.getElementById("fechaNacimiento").value;
    let fechaNacimiento = new Date(fecha);
    let fechaHoy = new Date();

    let anyNacimiento = fechaNacimiento.getFullYear();
    let mesNacimiento = fechaNacimiento.getMonth();
    let diaNacimiento = fechaNacimiento.getDate();

    let anyActual = fechaHoy.getFullYear();
    let mesActual = fechaHoy.getMonth();
    let diaActual = fechaHoy.getDate();

    let edad = anyActual - anyNacimiento;

    // Comprobamos si en el año actual ya los ha cumplido o no
    if (mesActual < mesNacimiento || (mesActual === mesNacimiento && diaActual < diaNacimiento)) {
        edad--;
    }

    alert("Han transcurrido " + edad + " años, aproximadamente, desde que naciste");
}