<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Avantage proteção veicular</title>

</head>

<body>


    <?php

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $placa = $_POST['placa'];
    $msg = $_POST['mensagem'];

    $mensagem = "

        <div style='font-family:Arial, Helvetica, sans-serif'>
            <div style='width: 100%;padding: 20px;background-color:#fff;'>
                <img width='250px' s src='https://www.avantage.org.br/cotar/online/assets/images/logoavantage.png' alt=''>
            </div>

            <div style='padding: 20px;width: 100%;'>
                <h3 style='margin-bottom: 10px;color:#f79833;'><strong>Fonte:</strong> Facebook / Instagram</h3>
                <h3 style='margin-bottom: 10px;color:#f79833;'><strong>Nome:</strong> $nome</h3>
                <h3 style='margin-bottom: 10px;color:#f79833;'><strong>E-mail:</strong> $email</h3>
                <h3 style='margin-bottom: 10px;color:#f79833;'><strong>Telefone:</strong> $telefone</h3>
                <h3 style='margin-bottom: 10px;color:#f79833;'><strong>Placa:</strong> $placa</h3>
                <h3 style='margin-bottom: 10px;color:#f79833;'><strong>Mensagem:</strong> $msg</h3>
            </div>

            <div
                style='background: linear-gradient(90deg, #282579 -2.2%, #BB43B3 109.35%);width: 60%;padding: 20px;color: #fff;'>
                <img width='20px' s src='https://agenciabrasildigital.com.br/assets/_img/favicon.png' alt=''>
            </div>
        </div>";



    $para = 'supervisor.opensat@gmail.com';


    $headers = "MIME-Version: 1.1\r\n";

    $headers .= "Content-type: text/html; charset=iso-8859-1\n";

    $headers .= "From: $email \r\n"; // remetente

    $headers .= "Return-Path: $email\r\n"; // return-path

    $envio = mail($para, 'LEAD RECEBIDO VIA FACEBOOK/INSTAGRAM', $mensagem, $headers);

    if ($envio)
        echo "<script>alert('Obrigado, em breve um de nossos consultores entrará em contato. Ou se preferir fale agora através do Whatsapp!'); window.location.href = 'https://api.whatsapp.com/send/?phone=5521973775167';</script>";


    else
        echo "<script>alert('Erro ao enviar mensagem, fale em nosso whatsapp!'); window.location.href = 'https://api.whatsapp.com/send/?phone=5521973775167';</script>";

    ?>

</body>

</html>