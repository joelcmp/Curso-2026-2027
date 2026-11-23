function setCookie(cname, cvalue, exdays) {
    let d = new Date();

    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

    let expires = "expires=" + d.toUTCString();

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";

    let ca = document.cookie.split(';');

    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];

        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }

    return "";
}

function deleteCookie(cname) {
    document.cookie = cname + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
}

function checkCookie() {
    let visitas = getCookie("visitas");

    // Comprobamos si existe
    if (visitas != "") {
        visitas = Number(visitas);
        visitas++;
    } else {
        visitas = 1;
    }

    // Si se visita mas de 10 veces entonces ponemos el contador a 0 y eliminamos la cookie
    if(visitas > 10) {
        visitas = 0;
        deleteCookie("visitas");
    } else {
        setCookie("visitas", visitas, 30);
    }

    document.getElementById("contador").textContent = "Numero de visitas: " + visitas;
}

checkCookie();
