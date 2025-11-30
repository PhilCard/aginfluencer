<?php

    require __DIR__ . '/../../vendor/PHPMailer/PHPMailer.php';
    require __DIR__ . '/../../vendor/PHPMailer/SMTP.php';
    require __DIR__ . '/../../vendor/PHPMailer/Exception.php';

    require __DIR__ . '/../../inc/env_loader.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function statusInfoEmail($assunto, $mensagemEmail) {

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'naoresponda@agenciadoinfluencer.com.br';
            $mail->Password = getenv('MAIL_PASS');
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Remetente e destinatário
            $mail->setFrom('naoresponda@agenciadoinfluencer.com.br', 'AGENCIA DO INFLUENCER');
            $mail->addAddress('', 'Influencer');

            // Conteúdo do email
            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body    = '<b>' . $mensagemEmail . '</b>';
            $mail->AltBody = $mensagemEmail;

            $mail->send();
            return 'Email enviado com sucesso!';
        } 
        catch (Exception $e) 
        {
            return "Erro ao enviar o email: {$mail->ErrorInfo}";
        }
    }
?>
