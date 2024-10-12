<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../lib/vendor/PHPMailer/phpmailer/src/Exception.php';
require '../lib/vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require '../lib/vendor/PHPMailer/phpmailer/src/SMTP.php';

// Definição das variáveis de conexão
$host = 'localhost';
$dbname = 'adcq';
$username = 'root';
$password = '';

session_start();

// Função para validar o email
function validarEmail($email) {
    $regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    return preg_match($regex, $email);
}

// Função para validar a senha
function validarSenha($senha) {
    return strlen($senha) >= 6; // Verifica se a senha tem pelo menos 6 caracteres
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recebe os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Validação do email
        if (!validarEmail($email)) {
            header("Location: ../index.php?error=Email inválido.");
            exit;
        }

        // Validação da senha
        if (!validarSenha($senha)) {
            header("Location: ../index.php?error=A senha deve ter pelo menos 6 caracteres.");
            exit;
        }

        // Verifica se o e-mail já está em uso
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: ../index.php?error=O email já está em uso.");
            exit;
        }

        // Gere um código de confirmação de 6 dígitos
        $codigoConfirmacao = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $_SESSION['codigo_confirmacao'] = $codigoConfirmacao; // Armazena o código na sessão
        $_SESSION['email'] = $email; // Armazena o email na sessão para verificar após a confirmação
        $_SESSION['nome'] = $nome; // Armazena o nome na sessão
        $_SESSION['senha'] = password_hash($senha, PASSWORD_DEFAULT); // Armazena a senha hasheada

            // Configuração do PHPMailer
        $mail = new PHPMailer(true);

        //Configurações do servidor SMTP
        $mail->isSMTP();                                      // Configura o envio usando SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io';               // Substitua pelo seu servidor SMTP
        $mail->SMTPAuth = true;                              // Habilita autenticação SMTP
        $mail->Username = 'a29b4cd4008020';          // Seu endereço de e-mail
        $mail->Password = 'c729d79922045e';                       // Sua senha do e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Ativar criptografia TLS
        $mail->Port = 2525;                                   // Porta TCP para conexão
        $mail->timeout = 5;

        // Remetente e destinatário
        $mail->setFrom('adcq@gmail.com', 'acervo digital de cultura quilombola');
        $mail->addAddress($email, $nome);                   // Adiciona o destinatário

        // Conteúdo do e-mail
        $mail->isHTML(true);                                 // Define o formato do e-mail como HTML
        $mail->Subject = 'Código de confirmação';
        $mail->Body    = 'Seu código de confirmação é: ' . $codigoConfirmacao;
        $mail->AltBody = 'Seu código de confirmação é: ' . $codigoConfirmacao;

        // Envia o e-mail
        $mail->send();
        

        // Redirecionar para a página de confirmação do código
        header("Location: confirmar-codigo.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
}
?>
