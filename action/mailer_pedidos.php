<?php
//LEMBRAR DE RETORNAR ERRO NO AJAX CASO OCORRA UM 

    require '../inc/lib/PHPMailer/src/PHPMailer.php';
    require '../inc/lib/PHPMailer/src/SMTP.php';
    require '../inc/lib/PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function statusInfoEmail($assunto, $mensagemEmail) {

        if
        (
            isset($_POST['preco_final']) && !empty($_POST['preco_final']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['whats']) && !empty($_POST['whats'])
        )
        {
            $value = trim($_POST['preco_final']);
            $value = preg_replace('/[^0-9,\.]/', '', $value);
            $value = (int) $value;
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $whats = preg_replace('/\D/', '', $_POST['whats']);

            if ($value === false) {
                return "Preço inválido";
            }
            if ($email === false) {
                return "E-mail inválido";
            }
            if (strlen($whats) < 10) {
                return "Número de WhatsApp inválido";
            }

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.example.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'example@example.com.br';
                $mail->Password = '#3443a@'; //<---senha app
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Remetente e destinatário
                $mail->setFrom('example@example.com.br', 'Example Sr');
                $mail->addAddress($email, 'Mr.');

                // Conteúdo do email
                $mail->isHTML(true);
                $mail->Subject = $assunto;
                $mail->Body    = '<b>'.$mensagemEmail. '</b>';
                $mail->AltBody = $mensagemEmail;

                $mail->send();
                return 'Email enviado com sucesso!';
            } 
            catch (Exception $e) 
            {
                return "Erro ao enviar o email: {$mail->ErrorInfo}";
            }

        }
        
    }
    
?>