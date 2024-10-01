<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $senha = $_POST['password'];

  $sql = "SELECT * FROM usuarios WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha_criptografada'])) {
      $_SESSION['usuario_id'] = $row['id'];
      header("Location: index.php");
      exit();
    } else {
      $error_message = "Senha incorreta.";
    }
  } else {
    $error_message = "Usuário não encontrado.";
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <div class="principal">
    <div class="bg">
    </div>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <form method="post" action="login.php">
            <h2>Login</h2>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required />
            </div>
            <div class="form-group">
              <label>Senha</label>
              <input type="password" name="password" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
            <a href="cadastro.php" class="btn btn-secondary">Cadastro</a>
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>