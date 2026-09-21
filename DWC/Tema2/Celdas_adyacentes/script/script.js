let c1 = document.getElementById("cas1");
let c2 = document.getElementById("cas2");
let c3 = document.getElementById("cas3");
let c4 = document.getElementById("cas4");

let esAzulc1 = true;
let esAzulc2 = true;
let esAzulc3 = true;
let esAzulc4 = true;

let intentos=0;
let int=document.createElement("h2");

let botonReset=document.createElement("button");

int.textContent=intentos+" intentos";
int.id="intentos";
document.querySelector("div").appendChild(int);

botonReset.textContent="Resetear juego";
botonReset.id="reset";
document.querySelector("div").appendChild(botonReset);




c1.addEventListener("click", cambioColorc1);
c2.addEventListener("click", cambioColorc2);
c3.addEventListener("click", cambioColorc3);
c4.addEventListener("click", cambioColorc4);
botonReset.addEventListener("click", resetearJuego);

function resetearJuego() {
location.reload();
}

function cambioColorc1() {
  if (esAzulc1) {
    c1.style.backgroundColor = "red";
    if (esAzulc2) {
      c2.style.backgroundColor = "red";
    } else {
      c2.style.backgroundColor = "blue";
    }
    if (esAzulc3) {
      c3.style.backgroundColor = "red";
    } else {
      c3.style.backgroundColor = "blue";
    }
  }else{
    c1.style.backgroundColor = "blue";
    if (esAzulc2) {
      c2.style.backgroundColor = "red";
    } else {
      c2.style.backgroundColor = "blue";
    }
    if (esAzulc3) {
      c3.style.backgroundColor = "red";
    } else {
      c3.style.backgroundColor = "blue";
    }
  }
  esAzulc1 = !esAzulc1;
  esAzulc2 = !esAzulc2;
  esAzulc3 = !esAzulc3;
  
  intentos++;
  int.textContent=intentos+" intentos";
}

function cambioColorc2() {
  if (esAzulc2) {
    c2.style.backgroundColor = "red";
    if (esAzulc1) {
      c1.style.backgroundColor = "red";
    } else {
      c1.style.backgroundColor = "blue";
    }
    if (esAzulc4) {
      c4.style.backgroundColor = "red";
    } else {
      c4.style.backgroundColor = "blue";
    }
  }else{
    c2.style.backgroundColor = "blue";
    if (esAzulc1) {
      c1.style.backgroundColor = "red";
    } else {
      c1.style.backgroundColor = "blue";
    }
    if (esAzulc4) {
      c4.style.backgroundColor = "red";
    } else {
      c4.style.backgroundColor = "blue";
    }
  }
  esAzulc2 = !esAzulc2;
  esAzulc1 = !esAzulc1;
  esAzulc4 = !esAzulc4;
intentos++;
int.textContent=intentos+" intentos";
}

function cambioColorc3() {
  if (esAzulc3) {
    c3.style.backgroundColor = "red";
    if (esAzulc1) {
      c1.style.backgroundColor = "red";
    } else {
      c1.style.backgroundColor = "blue";
    }
    if (esAzulc4) {
      c4.style.backgroundColor = "red";
    } else {
      c4.style.backgroundColor = "blue";
    }
  }else{
    c3.style.backgroundColor = "blue";
    if (esAzulc1) {
      c1.style.backgroundColor = "red";
    } else {
      c1.style.backgroundColor = "blue";
    }
    if (esAzulc4) {
      c4.style.backgroundColor = "red";
    } else {
      c4.style.backgroundColor = "blue";
    }
  }
  esAzulc3 = !esAzulc3;
  esAzulc1 = !esAzulc1;
  esAzulc4 = !esAzulc4;
intentos++;
int.textContent=intentos+" intentos";
}

function cambioColorc4() {
  if (esAzulc4) {
    c4.style.backgroundColor = "red";
    if (esAzulc2) {
      c2.style.backgroundColor = "red";
    } else {
      c2.style.backgroundColor = "blue";
    }
    if (esAzulc3) {
      c3.style.backgroundColor = "red";
    } else {
      c3.style.backgroundColor = "blue";
    }
  }else{
    c4.style.backgroundColor = "blue";
    if (esAzulc2) {
      c2.style.backgroundColor = "red";
    } else {
      c2.style.backgroundColor = "blue";
    }
    if (esAzulc3) {
      c3.style.backgroundColor = "red";
    } else {
      c3.style.backgroundColor = "blue";
    }
  }
  esAzulc4 = !esAzulc4;
  esAzulc2 = !esAzulc2;
  esAzulc3 = !esAzulc3;
intentos++;
int.textContent=intentos+" intentos";
}
