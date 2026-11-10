const configPanel = document.getElementById("config_panel");
const game = document.getElementById("game");
const buttonStart = document.getElementById("btn_start");

const cellStatus = [0, 1, 2, 3];

// 0: blanco sin descrubir- 1: mina sin descubrir- 2:bandera-blanco descubierta- 3: mina pisada- 4:mina sin pisar

buttonStart.addEventListener("click", () => {
  configPanel.classList.add("hidden");
  game.classList.remove("hidden");

  let columns = parseInt(document.getElementById("columns").value);
  let rows = parseInt(document.getElementById("rows").value);
  let probability = parseFloat(document.getElementById("probability").value);
  console.log(columns);
  let randomNumber;
  const cell = Array.from({ length: rows }, () => Array(columns).fill(0));

  for (let i = 0; i < cell.length; i++) {
    for (let j = 0; j < cell[i].length; j++) {
      randomNumber = Math.random(0, 1);
      if (randomNumber == probability) {
        cell[i][j] = 1;
      } else {
        cell[i][j] = 0;
      }
      let newCell = document.createElement("div");
      game.appendChild(newCell);
    }
  }
});
