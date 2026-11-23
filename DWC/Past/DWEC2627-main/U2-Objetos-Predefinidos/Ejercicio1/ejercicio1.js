function convertir() {
    let texto = document.getElementById("texto").value;

    let letras = texto.split("");
    let inversa = "";

    for (let i = letras.length - 1; i >= 0; i--) {
        inversa += letras[i];
    }
    
    let mayusculas = texto.toUpperCase();

    let repetida = "";

    for (let i = 0; i < 3; i++) {
        repetida += texto;
    }

    let inversaMayusculas = inversa.toUpperCase();

    document.getElementById("inversa").value = inversa;
    document.getElementById("mayusculas").value = mayusculas;
    document.getElementById("repetida").value = repetida;
    document.getElementById("inversaMayusculas").value = inversaMayusculas;
};

