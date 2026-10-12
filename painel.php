<?php
// painel.php - Página de boas-vindas

session_start();

// Protege a página
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
$nivel = $_SESSION['nivel'];
$hora_login = htmlspecialchars($_SESSION['hora_login'], ENT_QUOTES, 'UTF-8');

// Mensagem diferente para cada nível de acesso
if ($nivel === 'admin') {
    $mensagem = 'Você tem acesso total ao sistema meu piá.';
} else {
    $mensagem = 'Você tem acesso básico ao sistema, foi mal meu parceiro(a).';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>✅ Bem-vindo, <?php echo $usuario; ?>!</h2>
        <p>Você está logado com sucesso no sistema.</p>
        <p><?php echo $mensagem; ?></p>
        <p>Nível de acesso: <?php echo htmlspecialchars($nivel, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Login em: <?php echo $hora_login; ?></p>
        
        <div class="logout">
            <a href="logout.php">Sair do sistema</a>
        </div>
    </div>
</body>
</html>