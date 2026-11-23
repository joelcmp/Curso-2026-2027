const cartas = document.querySelectorAll('.carta');
const modal = document.getElementById('modal-carta');
const cerrarModal = document.getElementById('cerrar-modal');

cartas.forEach(function (carta) {
    carta.addEventListener('click', function () {
        document.getElementById('modal-img').src = carta.dataset.img;
        document.getElementById('modal-nombre').textContent = carta.dataset.nombre;
        document.getElementById('modal-especie').textContent = carta.dataset.especie;
        document.getElementById('modal-periodo').textContent = carta.dataset.periodo;
        document.getElementById('modal-hp').textContent = carta.dataset.hp;
        document.getElementById('modal-vigor').textContent = carta.dataset.vigor;
        document.getElementById('modal-ataque').textContent = carta.dataset.ataque;
        document.getElementById('modal-defensa').textContent = carta.dataset.defensa;
        document.getElementById('modal-agilidad').textContent = carta.dataset.agilidad;
        document.getElementById('modal-altura').textContent = carta.dataset.altura + ' m';
        document.getElementById('modal-largo').textContent = carta.dataset.largo + ' m';
        document.getElementById('modal-peso').textContent = carta.dataset.peso + ' t';

        modal.classList.remove('oculto');
    });
});

cerrarModal.addEventListener('click', function () {
    modal.classList.add('oculto');
});

const contador = document.getElementById('contador-tiempo');

if (contador) {
    let segundos = parseInt(contador.dataset.segundos, 10);

    const actualizar = function () {
        if (segundos <= 0) {
            contador.textContent = '¡Ya puedes abrir!';
            setTimeout(function () {
                location.reload();
            }, 1500);
            return;
        }

        const h = Math.floor(segundos / 3600);
        const m = Math.floor((segundos % 3600) / 60);
        const s = segundos % 60;

        contador.textContent = h + 'h ' + m + 'm ' + s + 's';

        segundos--;
        setTimeout(actualizar, 1000);
    };

    actualizar();
}