<?php
session_start();

$host = 'localhost';
$dbname = 'adcq';
$username = 'root';
$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Verifica se o usuário existe
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Depurando o valor de 'ativo'
        if ($user) {
            echo "Status de ativo: " . $user['ativo'];
        }

        if ($user && password_verify($senha, $user['senha'])) {
            if ($user['ativo'] == 'ativo') {
                // Iniciar a sessão e redirecionar o usuário
                $_SESSION['usuario'] = $user;
                // Se o código for confirmado, insira o novo usuário no banco de dados
                session_unset();
                session_destroy();
                header('Location: /adcq-implementado/pagina-principal.php?success=Código confirmado! Acesso liberado.');
                exit;

            } else {
                // Se o usuário não estiver ativo
                header("Location: ../index.php?error=Sua conta ainda não foi ativada. Verifique seu e-mail.");
                exit;
            }
        } else {
            // Credenciais inválidas
            header("Location: ../index.php?error=Email ou senha incorretos.");
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
}
?>