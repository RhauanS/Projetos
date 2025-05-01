document.addEventListener('DOMContentLoaded', function () {
    let seletor1 = document.getElementById('seletor1');
    let resultado1 = document.getElementById('resultado1');

    seletor1.addEventListener('change', function () {
        if (seletor1.value === '1500') {
            resultado1.textContent = "Certa resposta";
            resultado1.style.color = "green";
        } else {
            resultado1.textContent = "Resposta errada";
            resultado1.style.color = "red";
        }

        let seletor2 = document.getElementById('seletor2');
        let resultado2 = document.getElementById('resultado1');



    });
    seletor2.addEventListener('change', function () {
        if (seletor2.value == 'B') {
            resultado2.textContent = 'Certa Resposta';
            resultado2.style.color = 'green';
        }
        else {
            resultado2.textContent = 'Resposta errada';
            resultado2.style.color = 'red';
        }
    });
});

