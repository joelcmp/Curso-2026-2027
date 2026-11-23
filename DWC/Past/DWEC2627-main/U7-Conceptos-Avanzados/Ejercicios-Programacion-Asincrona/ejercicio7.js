function esperar(ms) {
  return new Promise((resolver) => setTimeout(resolver, ms));
}

async function semaforo(ciclos) {
    for (let i = 0; i < ciclos; i++) {
        try {
            console.log("ROJO");
            await esperar(3000);
            console.log("VERDE");
            await esperar(2000);
            console.log("ÁMBAR");
            await esperar(1000);
        } catch (error) {
            console.log(error.message);
        }
    }
    console.log("Semáforo apagado");
}

semaforo(2);