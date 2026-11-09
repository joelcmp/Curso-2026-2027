const slot1 = document.getElementById("slot1");
const slot2 = document.getElementById("slot2");
const slot3 = document.getElementById("slot3");
const btn_throw = document.getElementById("btn_throw");
const creditsScreen=document.getElementById("credits");

creditsScreen.textContent="Credits: "+credits;

// 0 campana, 1 ciruela, 2 limon, 3 naranja,4 siete

let credits = 100;
updateCredits();

btn_throw.addEventListener("click", throwLever);

function throwLever() {
  let pSlot1 = Math.floor(Math.random() * 5);
  let pSlot2 = Math.floor(Math.random() * 5);
  let pSlot3 = Math.floor(Math.random() * 5);

    if (credits<10) {
        alert("You have run out of credits");
    }

  credits -= 10;

  if (pSlot1 == 0) {
    document.querySelector("#slot1 img").src = "../Tragaperras/res/campana.png";
  } else if (pSlot1 == 1) {
    document.querySelector("#slot1 img").src = "../Tragaperras/res/ciruela.png";
  } else if (pSlot1 == 2) {
    document.querySelector("#slot1 img").src = "../Tragaperras/res/limon.png";
  } else if (pSlot1 == 3) {
    document.querySelector("#slot1 img").src = "../Tragaperras/res/naranja.png";
  } else {
    document.querySelector("#slot1 img").src = "../Tragaperras/res/siete.png";
  }
  if (pSlot2 == 0) {
    document.querySelector("#slot2 img").src = "../Tragaperras/res/campana.png";
  } else if (pSlot2 == 1) {
    document.querySelector("#slot2 img").src = "../Tragaperras/res/ciruela.png";
  } else if (pSlot2 == 2) {
    document.querySelector("#slot3 img").src = "../Tragaperras/res/limon.png";
  } else if (pSlot2 == 3) {
    document.querySelector("#slot2 img").src = "../Tragaperras/res/naranja.png";
  } else {
    document.querySelector("#slot1 img").src = "../Tragaperras/res/siete.png";
  }
  if (pSlot3 == 0) {
    document.querySelector("#slot3 img").src = "../Tragaperras/res/campana.png";
  } else if (pSlot3 == 1) {
    document.querySelector("#slot3 img").src = "../Tragaperras/res/ciruela.png";
  } else if (pSlot3 == 2) {
    document.querySelector("#slot3 img").src = "../Tragaperras/res/limon.png";
  } else if (pSlot3 == 3) {
    document.querySelector("#slot3 img").src = "../Tragaperras/res/naranja.png";
  } else {
    document.querySelector("#slot3 img").src = "../Tragaperras/res/siete.png";
  }


   if (pSlot1 == 0 && pSlot2 == 0 && pSlot3 == 0) {
    credits += 20;
  } else if (pSlot1 == 1 && pSlot2 == 1 && pSlot3 == 1) {
    credits += 10;
  } else if (pSlot1 == 2 && pSlot2 == 2 && pSlot3 == 2) {
    credits += 7;
  } else if (pSlot1 == 3 && pSlot2 == 3 && pSlot3 == 3) {
    credits += 5;
  } else if (pSlot1 == 4 && pSlot2 == 4 && pSlot3 == 4) {
    credits += 50;
  }
  updateCredits();
}
