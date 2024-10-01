<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['fullname'];
  $email = $_POST['email'];
  $senha = $_POST['password'];
  $confirm_senha = $_POST['confirm_password'];

  if ($senha != $confirm_senha) {
    echo "As senhas não coincidem.";
    exit();
  }

  $senha_criptografada = password_hash($senha, PASSWORD_BCRYPT);

  $sql = "INSERT INTO usuarios (nome, email, senha_criptografada) VALUES ('$nome', '$email', '$senha_criptografada')";

  if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
    header("Location: login.php");
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
