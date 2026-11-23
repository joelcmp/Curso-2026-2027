class Animal {
    constructor(nombre, edad) {
        this.nombre = nombre;
        this.edad = edad;
    }

    emitirSonido() {
        return "sonido genérico";
    }
}

class Perro extends Animal {
    constructor(nombre, edad) {
        super(nombre, edad);
    }

    emitirSonido() {
        return "¡Guau!";
    }
}

let perro = new Perro("Toby", 3);

console.log(perro.emitirSonido());