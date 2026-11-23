function Rectangulo(width, height) {
    if (width <= 0) {
        this.width = 1;
    } else {
        this.width = width;
    }

    if (height <= 0) {
        this.height = 1;
    } else {
        this.height = height;
    }
}

// Método para cambiar las dimensiones
Rectangulo.prototype.cambiarDimensiones = function(width, height) {
    this.width = width;
    this.height = height;
}

// Método para calcular el área del rectángulo
Rectangulo.prototype.calcularArea = function () {
    return this.width * this.height;
}

// Método para copiar un rectángulo
Rectangulo.prototype.copia = function() {
    return new Rectangulo(this.width, this.height);
}

// Método para comparar rectángulos
Rectangulo.prototype.comparar = function(otroRectangulo) {
    let area1 = this.calcularArea();
    let area2 = otroRectangulo.calcularArea();

    if (area1 > area2) {
        return "mayor";
    } else if (area1 < area2) {
        return "menor";
    } else {
        return "igual";
    }
}

let resultado = document.getElementById("resultado");

// Creamos 3 rectangulos
let rectangulo1 = new Rectangulo(5, 10);
let rectangulo2 = new Rectangulo(3, 8);
let rectangulo3 = new Rectangulo(0, -5);

// Mostramos el resultado de comprobar el constructor
mostrarTitulo("Comprobación del constructor");

mostrarResultado("Rectángulo 1: " + rectangulo1.width + " x " + rectangulo1.height);
mostrarResultado("Rectángulo 2: " + rectangulo2.width + " x " + rectangulo2.height);
mostrarResultado("Rectángulo 3: " + rectangulo3.width + " x " + rectangulo3.height);

// Mostramos el resultado de comprobar cambiarDimensiones()
mostrarTitulo("Comprobación de cambiarDimensiones()");

rectangulo1.cambiarDimensiones(7, 12);

mostrarResultado("Nuevas dimensiones del rectángulo 1: " + rectangulo1.width + " x " + rectangulo1.height);

// Mostramos el resultado de comprobar calcularArea()
mostrarTitulo("Comprobación de calcularArea()");

mostrarResultado("Área del rectángulo 1: " + rectangulo1.calcularArea());
mostrarResultado("Área del rectángulo 2: " + rectangulo2.calcularArea());
mostrarResultado("Área del rectángulo 3: " + rectangulo3.calcularArea());

// Mostramos el resultado de comprobar copia()
mostrarTitulo("Comprobación de copia()");

let copia = rectangulo1.copia();

mostrarResultado("Dimensiones de la copia: " + copia.width + " x " + copia.height);

copia.cambiarDimensiones(2, 4);

mostrarResultado("Dimensiones del original (rectángulo 1): " + rectangulo1.width + " x " + rectangulo1.height);
mostrarResultado("Nuevas dimensiones de la copia: " + copia.width + " x " + copia.height);

// Mostramos el resultado de comprobar comparar()
mostrarTitulo("Comprobación de comparar()");

mostrarResultado("Rectángulo 1 respecto al rectángulo 2: " + rectangulo1.comparar(rectangulo2));
mostrarResultado("Rectángulo 2 respecto al rectángulo 1: " + rectangulo2.comparar(rectangulo1));

let copia3 = rectangulo3.copia()
mostrarResultado("Copia del rectángulo 3: " + copia3.width + " x " + copia3.height);
mostrarResultado("Comparación entre el rectángulo 3 y su copia: " + rectangulo3.comparar(copia3));