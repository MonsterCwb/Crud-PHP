function login() {
  const email = document.getElementById("email").value;
  const senha = document.getElementById("senha").value;

  if (autenticarUsuario(email, senha)) {
    document.getElementById("login-container").style.display = "none";
    document.getElementById("crud-container").style.display = "block";
  } else {
    alert("Usuário ou senha inválidos.");
  }
}

// Simulação da função de autenticação
function autenticarUsuario(email, senha) {
  // Substitua esta lógica pela sua própria verificação de autenticação
  return email === "usuario@exemplo.com" && senha === "senha123";
}
