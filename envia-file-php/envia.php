<?php

if(isset($_FILES['curriculum']))
{
	$from_email		 = 'yuutoandrew.jpn@gmail.com'; 
	$recipient_email = 'yuutoandrew.jpn@gmail.com'; 
	
	$name = $_POST["nome"];
	$email = $_POST["email"]; 
	$celular = $_POST["celular"]; 
	$msg = $_POST["mensagem"]; 

    $message = "

        <div style='font-family:Arial, Helvetica, sans-serif'>
            <div style='width: 100%;padding: 20px;background-color:#fff;'>
                <img width='150px' src='https://agenciabrasildigital.com.br/projetos/realcoop/public/assets/img/realcoop-png.png' alt=''>
            </div>

            <div style='padding: 0 20px 20px 20px;width: 100%;'>
                <h3 style='margin-bottom: 10px;color:#000;'><strong>Nome:</strong> $name</h3>
                <h3 style='margin-bottom: 10px;color:#000;'><strong>E-mail:</strong> $email</h3>
                <h3 style='margin-bottom: 10px;color:#000;'><strong>Celular:</strong> $celular</h3>
                <h3 style='margin-bottom: 10px;color:#000;'><strong>Mensagem:</strong> $msg</h3>
            </div>

            <div
                style='background: linear-gradient(90deg, #282579 -2.2%, #BB43B3 109.35%);width: 60%;padding: 20px;color: #fff;'>
                <img width='20px' s src='https://agenciabrasildigital.com.br/assets/_img/favicon.png' alt=''>
            </div>
        </div>";


	$tmp_name = $_FILES['curriculum']['tmp_name']; 
	$name	 = $_FILES['curriculum']['name']; 
	$size	 = $_FILES['curriculum']['size']; 
	$type	 = $_FILES['curriculum']['type']; 
	$error	 = $_FILES['curriculum']['error']; 

	if($error > 0)
	{
		die('Upload error or No files uploaded');
	}

	$handle = fopen($tmp_name, "r");
	$content = fread($handle, $size); 
	fclose($handle);

	$encoded_content = chunk_split(base64_encode($content));
	$boundary = md5("random");

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "From:".$from_email."\r\n";
	$headers .= "Reply-To: ".$email."\r\n";
	$headers .= "Content-Type: multipart/mixed;";
	$headers .= "boundary = $boundary\r\n";
		
	$body = "--$boundary\r\n";
	$body .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
	$body .= chunk_split(base64_encode($message));
		
	$body .= "--$boundary\r\n";
	$body .="Content-Type: $type; name=".$name."\r\n";
	$body .="Content-Disposition: attachment; filename=".$name."\r\n";
	$body .="Content-Transfer-Encoding: base64\r\n";
	$body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
	$body .= $encoded_content;
	
	$sentMailResult = mail($recipient_email, 'Trabalhe conosco recebido pelo site RealCoop', $body, $headers);

	if($sentMailResult )
	{
		echo "<script>alert('Obrigado, em breve um de nossos consultores entrará em contato.'); window.location.href = 'https://agenciabrasildigital.com.br/projetos/realcoop/public/index.php/trabalhe';</script>";
	}
	else
	{
		echo "<script>alert('Erro ao enviar mensagem, tenta novamente mais tarde.'); window.location.href = 'https://agenciabrasildigital.com.br/projetos/realcoop/public/index.php/trabalhe';</script>";
	}
}
?>
