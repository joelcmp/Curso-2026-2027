const configPanel = document.getElementById("config_panel");
const game = document.getElementById("game");
const buttonStart = document.getElementById("btn_start");

const cellStatus = [0, 1, 2, 3];

// 0: blanco sin descrubir- 1: mina sin descubrir- 2:bandera-blanco descubierta- 3: mina pisada- 4:mina sin pisar

buttonStart.addEventListener("click", () => {
  configPanel.classList.add("hidden");
  game.classList.remove("hidden");

  let columns = document.textContent("columns");
  let rows = document.textContent("rows");
  let probability = document.textContent("probability");
  let randomNumber;
  const cell = Array.from({ length: rows }, () => Array(columns).fill(0));

  for (let i = 0; fila < cuadricula.length; fila++) {
    for (let j = 0; columna < cuadricula[fila].length; columna++) {
      randomNumber = Math.random(0, 1);
      if (randomNumber == probability) {
        cell[i][j] = 1;
      } else {
        cell[i][j] = 0;
      }
    }
    let newCell=document.createElement("div");
    

  }
});
