let persona = {
    nombre: "Juan",
    edad: 30,
    profesion: "Ingeniero",
    presentarse() {
        return "Hola soy " + this.nombre + " y soy " + this.profesion;
    },
    cumplirAnios() {
        this.edad++;
    }
}

console.log(persona.presentarse());

persona.cumplirAnios();

console.log("Ahora tengo " + persona.edad);