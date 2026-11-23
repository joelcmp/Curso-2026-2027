let persona = {
    nombre: "Juan",
    edad: 30,
    profesion: "Ingeniero",
    presentarse() {
        return "Hola soy " + this.nombre + " y soy " + this.profesion;
    },
}

console.log(persona.presentarse());