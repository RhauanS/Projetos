document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("myForm")
    .addEventListener("submit", function (event) {
      const email = document.getElementById("email").value;
      const senha = document.getElementById("senha").value;

      // Validação do email
      // Validação do e-mail
      if (!validateEmail(email)) {
        alert("Por favor, insira um e-mail válido.");
        event.preventDefault(); // Impede o envio do formulário
        // Aqui você pode adicionar feedback visual também, caso deseje
        document.getElementById("email").style.borderColor = "red";
      }

      // Validação da senha
      if (senha.length < 6) {
        alert("A senha deve ter pelo menos 6 caracteres.");
        event.preventDefault(); // Impede o envio do formulário
      }

      // Desabilitar o botão de enviar e mostrar mensagem ao enviar
      const submitButton = this.querySelector('input[type="submit"]');
      submitButton.disabled = true;
      submitButton.value = "Enviando...";
    });

  // Função para validar o email
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  // Feedback em tempo real da senha
  document.getElementById("senha").addEventListener("input", function () {
    const senha = this.value;
    const feedback = document.getElementById("senhaFeedback");

    if (senha.length < 6) {
      feedback.textContent = "Senha fraca. Deve ter pelo menos 6 caracteres.";
      feedback.style.color = "red";
    } else {
      feedback.textContent = "Senha forte.";
      feedback.style.color = "green";
    }
  });
});
