<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <title>Cadastro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <div class="principal">
    <div class="bg"></div>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-md-6 text-center">
        <h1>Cadastro</h1>
        <form action="inserir_usuario.php" method="post">
          <div class="form-group">
            <label>Nome Completo</label>
            <input type="text" name="fullname" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Confirme sua Senha</label>
            <input type="password" name="confirm_password" class="form-control" required />
          </div>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          <a href="login.php" class="btn btn-secondary">Voltar para Login</a>
        </form>
      </div>
    </div>
  </div>

  <script>
    document
      .getElementById("btn btn-primary")
      .addEventListener("click", function() {
        alert("Nos vemos no Mexico!");
      });
  </script>
</body>

</html>