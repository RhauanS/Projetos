document.addEventListener('DOMContentLoaded', function () {
    let seletor1 = document.getElementById('seletor1');
    let resultado1 = document.getElementById('resultado1');

    /* inicio do script da questão 1 */
    seletor1.addEventListener('change', function () {
        if (seletor1.value === '1500') {
            resultado1.textContent = "Certa resposta";
            resultado1.style.color = "green";
        } else {
            resultado1.textContent = "Resposta errada";
            resultado1.style.color = "red";
        }

    });

    /*final do script da questão 1 e inicio da questão 2*/
    let seletor2 = document.getElementById('seletor2');
    let resultado2 = document.getElementById('resultado2');
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
    /*final do script da questão 1 e inicio da questão 2*/
    let seletor3 = document.getElementById('seletor3');
    let resultado3 = document.getElementById('resultado3');

    seletor3.addEventListener('change', function(){
        if(seletor3.value == '2 4'){
            resultado3.textContent = 'Certa Resposta';
            resultado3.style.color = 'green';
        }

        else{
            resultado3.textContent = 'Resposta Incorreta';
            resultado3.style.color = 'red';
        }
    });



});

