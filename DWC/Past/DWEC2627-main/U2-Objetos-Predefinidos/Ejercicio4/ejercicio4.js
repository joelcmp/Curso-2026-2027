function convertir() {
    let decimal = Number(document.getElementById("numero").value);

    let binario = decimal.toString(2);
    let octal = decimal.toString(8);
    let hexadecimal = decimal.toString(16);

    document.getElementById("binario").innerText = binario;

    document.getElementById("octal").innerText = octal;

    document.getElementById("hexadecimal").innerText = hexadecimal;
}