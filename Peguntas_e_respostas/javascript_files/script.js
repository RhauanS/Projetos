document.addEventListener('DOMContentLoaded', function(){
    let nome = document.getElementById('nome');
    let numero = document.getElementById('numero');
    let senha = document.getElementById('senha');

    // Quando o formulário for enviado
    document.querySelector('form').addEventListener('submit', function(e){
        if(nome.value.trim() === '' || numero.value.trim() === '' || senha.value.trim() === ''){
            e.preventDefault(); // impede o envio do formulário
            alert('Complete todas as informações');
        }
    });

    // Verifica força da senha em tempo real
    senha.addEventListener('input', function(){
        let result = document.getElementById('senha_resultado');
        let valorSenha = senha.value;

        if(valorSenha.length <= 3){
            result.textContent = 'Senha fraca';
            result.style.color = 'red';
            result.style.padding = '5px';
            result.style.borderRadius = '5px';
        } else if(valorSenha.length <= 6){
            result.textContent = 'Senha média';
            result.style.color = 'yellow';
            
        } else {
            result.textContent = 'Senha forte';
            result.style.color = 'green';
           
        }
    });
});
