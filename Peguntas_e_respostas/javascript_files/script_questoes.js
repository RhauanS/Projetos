document.addEventListener('DOMContentLoaded', function () {
    let seletor = document.getElementById('seletor');
    let resultado = document.getElementById('resultado');

    seletor.addEventListener('change', function () {
        if (seletor.value === '1500') {
            resultado.textContent = "Certa resposta";
            resultado.style.color = "green";
        } else {
            resultado.textContent = "Resposta errada";
            resultado.style.color = "red";
        }
    });
});

