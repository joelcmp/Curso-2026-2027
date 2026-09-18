let c1 = document.getElementById("cas1");
let c2 = document.getElementById("cas2");
let c3 = document.getElementById("cas3");
let c4 = document.getElementById("cas4");



  c1.addEventListener("click", cambioColorc1);
  c2.addEventListener("click", cambioColorc2);
let esAzul = true;

function cambioColorc1() {
  if (esAzul) {
    c1.style.backgroundColor = "red";
    c2.style.backgroundColor = "red";
    c3.style.backgroundColor = "red";
  } else {
    c1.style.backgroundColor = "blue";
    c2.style.backgroundColor = "blue";
    c3.style.backgroundColor = "blue";
  }
  esAzul = !esAzul;
}
function cambioColorc2() {
  if (esAzul) {
    c1.style.backgroundColor = "red";
    c2.style.backgroundColor = "red";
    c4.style.backgroundColor = "red";
  } else {
    c1.style.backgroundColor = "blue";
    c2.style.backgroundColor = "blue";
    c4.style.backgroundColor = "blue";
  }
  esAzul = !esAzul;
}