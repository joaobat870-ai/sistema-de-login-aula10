<?php
// valida.php - Processa o login e inicia a sessão

session_start();

// Dados simulados 
$usuarios = [
    'admin' => ['senha' => '12345', 'nivel' => 'admin'],
    'maria' => ['senha' => 'abcde', 'nivel' => 'usuario'],
];

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

if (isset($usuarios[$usuario]) && $usuarios[$usuario]['senha'] === $senha) {
    // Armazena os dados do login na sessão
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nivel'] = $usuarios[$usuario]['nivel'];
    $_SESSION['hora_login'] = date('d/m/Y H:i:s');

    // Redireciona
    header('Location: painel.php');
    exit;
} else {
    // Página de erro com estilo
    echo "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='stylesheet' href='css/estilo.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>❌ Login inválido!</h2>
            <p>Usuário ou senha incorretos.</p>
            <a href='login.html'>Tentar novamente</a>
        </div>
    </body>
    </html>";
}
?>