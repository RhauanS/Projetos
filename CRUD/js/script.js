document.addEventListener('DOMContentLoaded', function () {
  const myform = document.getElementById('myform');
  
  myform.addEventListener('submit', function (event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    // Verifica se os campos estão vazios
    if (nome === '' || email === '' || senha === '') {
      event.preventDefault();
      alert('Campos inválidos, por favor insira seus dados');
      return;
    }

    // Verifica se a senha tem mais de 6 caracteres
    if (senha.length < 6) {
      event.preventDefault();
      alert('A senha deve conter mais de 6 caracteres');
      return;
    }

    // Feedback sobre a força da senha
    const feedbacksenha = document.getElementById('feedbacksenha');
    if (senha.length >= 6 && senha.length <= 8) {
      feedbacksenha.style.color = 'orange'; // Cor para senha média
      feedbacksenha.textContent = 'Senha média';
    } else if (senha.length > 8) {
      feedbacksenha.style.color = 'green'; // Cor para senha forte
      feedbacksenha.textContent = 'Senha forte';
    } else {
      feedbacksenha.style.color = 'red'; // Cor para senha fraca
      feedbacksenha.textContent = 'Senha fraca';
    }
  });
});
