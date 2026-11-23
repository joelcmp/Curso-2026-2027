function descargar(nombre, callback) { 
  setTimeout(() => { 
    if (nombre === '') callback(Error('Nombre de archivo vacío')); 
    else callback(null, 'contenido de ' + nombre); 
  }, 1000);
}

function descargarP(nombre) {
    return new Promise((resolve, reject) => {
        descargar(nombre, (error, contenido) => {
            if (error) {
                reject(error);
            } else {
                resolve(contenido);
            }
        });
    });
}

async function descargarArchivos() {
    try {
        let a = await descargarP('a.txt');
        console.log(a);

        let b = await descargarP('b.txt');
        console.log(b);

        let c = await descargarP('c.txt');
        console.log(c);

        console.log('Descargas terminadas');

    } catch (error) {
        console.log('Error:', error.message);
    }
}

descargar('a.txt', (error, a) => { 
  if (error) { 
    console.log('Error:', error.message); 
  } else {
    console.log(a); 
    descargar('b.txt', (error, b) => { 
      if (error) { 
        console.log('Error:', error.message); 
      } else { 
        console.log(b); 
        descargar('c.txt', (error, c) => { 
          if (error) { 
            console.log('Error:', error.message); 
          } else { 
            console.log(c); 
            console.log('Descargas terminadas'); 
          }
        });
      }
    });
  }
});

descargarP('a.txt')
    .then((a) => {
        console.log(a);
        return descargarP('b.txt');
    })
    .then((b) => {
        console.log(b);
        return descargarP('c.txt');
    })
    .then((c) => {
        console.log(c);
        console.log('Descargas terminadas');
    })
    .catch((error) => {
        console.log('Error:', error.message);
    });

descargarArchivos();