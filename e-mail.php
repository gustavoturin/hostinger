<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $solic = $_POST['solic'];
    $details = $_POST['details'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.hostinger.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'dados@turinarteepapel.com'; 
        $mail->Password   = '5u[QCD~w'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 993; 

        $mail->setFrom('dados@turinarteepapel.com', 'Dados - Adriana Turin Arte em Papel');
        $mail->addAddress('guturin96@gmail.com', 'Gustavo Turin');

        $mail->isHTML(true);
        $mail->Subject = 'Nova solicitação de formulário';
        $mail->Body    = "<h1>Nova Solicitação</h1>
                           <p><strong>Nome Completo:</strong> $nome</p>
                           <p><strong>Email:</strong> $email</p>
                           <p><strong>Telefone:</strong> $telefone</p>
                           <p><strong>Solicitação:</strong> $solic</p>
                           <p><strong>Detalhes:</strong> $details</p>";

        $mail->send();
        echo 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        echo "Não foi possível enviar o e-mail. Erro: {$mail->ErrorInfo}";
    }
} else {
    echo 'Método de solicitação inválido.';
}
?>
