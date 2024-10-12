<?php
$host = 'localhost';
$dbname = 'adcq';
$username = 'root';
$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['codigo'])) {
    $codigoInserido = $_POST['codigo'];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifica se o código está correto
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE codigo_confirmacao = :codigo AND ativo = 'aguardando confirmação'");
        $stmt->bindParam(':codigo', $codigoInserido);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Atualiza o status do usuário para 'ativo' e remove o código
            $stmt = $conn->prepare("UPDATE usuario SET ativo = 'ativo', codigo_confirmacao = NULL WHERE codigo_confirmacao = :codigo");
            $stmt->bindParam(':codigo', $codigoInserido);
            $stmt->execute();
            echo "Email confirmado com sucesso!";
            // Aqui você pode redirecionar o usuário para outra página
        } else {
            echo "Código inválido.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Código não fornecido.";
}
?>
