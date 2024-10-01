<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
  header("Location: login.php");
  exit();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $conteudo = $_POST['conteudo'];
  $usuario_id = $_SESSION['usuario_id'];

  $stmt = $conn->prepare("INSERT INTO postagens (titulo, conteudo, usuario_id) VALUES (?, ?, ?)");
  $stmt->bind_param("ssi", $titulo, $conteudo, $usuario_id);

  if ($stmt->execute()) {
    header("Location: index.php");
    exit();
  } else {
    echo "Erro: " . $stmt->error;
  }

  $stmt->close();
}

$sql = "SELECT * FROM postagens ORDER BY id DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <title>Midnight Club</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <style>
    .post-box {
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 10px;
      margin: 20px 0;
    }

    .post-box textarea {
      width: 100%;
      border-radius: 5px;
      border: 1px solid #ccc;
      padding: 10px;
    }

    .post-box button {
      margin-top: 10px;
    }

    .postagem {
      border: 1px solid #ccc;
      padding: 15px;
      border-radius: 10px;
      margin: 10px 0;
    }
  </style>
</head>

<body>
  <div class="principal">
    <div class="bg"></div>
    <header class="header">
      <h1>Midnight Club</h1>
      <nav>
        <ul>
          <li><a href="about.php">Sobre</a></li>
        </ul>
      </nav>
    </header>
    <main id="conteudo-tela-principal">
      <p>O clube das corridas no México!</p>

      <div class="container">
        <div class="post-box">
          <form method="POST" action="">
            <h4>Criar Nova Postagem</h4>
            <div class="form-group">
              <input type="text" name="titulo" class="form-control" placeholder="Título" required>
            </div>
            <div class="form-group">
              <textarea name="conteudo" rows="4" class="form-control" placeholder="O que você está pensando?" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Postar</button>
          </form>
        </div>

        <!-- Lista de Postagens -->
        <div class="post-list">
          <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="postagem">
              <h5><?php echo htmlspecialchars($row['titulo']); ?></h5>
              <p><?php echo htmlspecialchars($row['conteudo']); ?></p>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </main>
  </div>
</body>

</html>