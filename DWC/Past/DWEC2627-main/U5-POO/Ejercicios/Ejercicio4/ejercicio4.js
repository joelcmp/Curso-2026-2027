class Coche {
    constructor(marca, modelo, anio) {
        this.marca = marca;
        this.modelo = modelo;
        this.anio = anio;
    }

    detalles() {
        return this.marca + " - " + this.modelo + " - " + this.anio;
    }
}

let coche1 = new Coche("Toyota", "Corolla", 2022);
let coche2 = new Coche("BMW", "Serie 3", 2024);

console.log(coche1.detalles());
console.log(coche2.detalles());