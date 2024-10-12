<?php
session_start();

// Exibir erros (apenas para desenvolvimento)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifique se a variável de sessão 'email' está definida
if (!isset($_SESSION['email'])) {
    header('Location: /adcq-implementado/index.php?error=Você deve se cadastrar primeiro.');
    exit;
}

// Inicialize a variável de erro
$erro = '';

// Verifique se o código foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoConfirmacao = $_POST['codigoConfirmacao'];
    $codigoGerado = $_SESSION['codigo_confirmacao']; // Código gerado e armazenado na sessão

    if ($codigoConfirmacao === $codigoGerado) {
        // Se o código for confirmado, insira o novo usuário no banco de dados
        $host = 'localhost';
        $dbname = 'adcq';
        $username = 'root';
        $password = '';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insira o novo usuário no banco de dados
            $nome = $_SESSION['nome'];
            $email = $_SESSION['email'];
            $senhaHash = $_SESSION['senha']; // Senha já hasheada

            $stmt = $conn->prepare("INSERT INTO usuario (nome, email, senha, token, ativo, codigo_confirmacao) VALUES (:nome, :email, :senha, :token, 'ativo', NULL)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senhaHash);
            $stmt->execute();

            // Limpar as variáveis de sessão
            session_unset();
            session_destroy();

            // Redirecionar para a tela de login
            header('Location: /adcq-implementado/index.php?success=Código confirmado! Você pode fazer login.');
            exit;

        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    } else {
        $erro = "Código de confirmação incorreto.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Código</title>
    <link rel="stylesheet" href="../css/confirmar-codigo.css">

</head>
<body>
<div class="modal-backdrop">
    <div class="modal-content">
        <h2>Confirmação de E-mail</h2>
        <p>Um código de confirmação foi enviado para o seu e-mail. Por favor, insira o código abaixo:</p>
        <form action="confirmar-codigo.php" method="POST">
            <input type="text" name="codigoConfirmacao" placeholder="Código de confirmação" required>
            <button type="submit">Confirmar Código</button>
        </form>
        <span class="close-btn" onclick="closeModal()">×</span>
    </div>
</div>

<script>
    function closeModal() {
        document.querySelector('.modal-backdrop').style.display = 'none';
    }
</script>


        <!-- Exibe erro, se houver -->
        <?php if (!empty($erro)): ?>
            <div class="error" style="color: red;">
                <p><?php echo htmlspecialchars($erro); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
