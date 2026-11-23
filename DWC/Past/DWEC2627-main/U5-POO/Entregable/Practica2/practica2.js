class Ordenador {
    constructor(marca, modelo, ram = 4, discoDuro = 512, pulgadas = 17) {
        this.marca = marca;
        this.modelo = modelo;
        this.ram = ram;
        this.discoDuro = discoDuro;
        this.pulgadas = pulgadas;
    }

    toString() {
        return "Marca: " + this.marca + " - " +
               "Modelo: " + this.modelo + " - " +
               "RAM: " + this.ram + " GB - " +
               "Disco duro: " + this.discoDuro + " GB - " +
               "Pantalla: " + this.pulgadas + " pulgadas";
    }
}

class Portatil extends Ordenador {
    constructor(marca, modelo, ram = 4, discoDuro = 256, pulgadas = 12, autonomia = 4) {
        super(marca, modelo, ram, discoDuro, pulgadas);
        this.autonomia = autonomia;
    }

    toString() {
        return super.toString() + " - Autonomía: " + this.autonomia + " horas";
    }
}

let ordenador1 = new Ordenador("HP", "Pavilion");
let ordenador2 = new Ordenador("ASUS", "VivoBook", 8, 1024, 15.6);

let portatil1 = new Portatil("Lenovo", "IdeaPad");
let portatil2 = new Portatil("Apple", "MacBook Air", 16, 512, 13.6, 18);

let resultado = document.getElementById("resultado");

// Comprobación de ordenadores
mostrarTitulo("Ordenadores: ");
mostrarResultado(ordenador1.toString());
mostrarResultado(ordenador2.toString());

// Comprobación de portátiles
mostrarTitulo("Portátiles: ");
mostrarResultado(portatil1.toString());
mostrarResultado(portatil2.toString());