function divide(a, b) {
    if (b == 0) {
        throw new Error("No se puede dividir por cero");
    } else {
        return a / b;
    }
}

try {
    divide(10, 0);
} catch (error) {
    console.log("Error:", error.message);
}