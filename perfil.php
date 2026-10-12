<?php
// perfil.php - Página acessível apenas pelo admin

session_start();

// Protege a página: precisa estar logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

// Somente o admin pode ver
if ($_SESSION['nivel'] !== 'admin') {
    echo "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Acesso negado</title>
        <link rel='stylesheet' href='css/estilo.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>🚫 Acesso negado</h2>
            <p>Esta página é acessível apenas pelo admin.</p>
            <a href='painel.php'>Voltar ao painel</a>
        </div>
    </body>
    </html>";
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>👤 Perfil</h2>
        <p>Usuário: <?php echo $usuario; ?></p>
        <p>Nível de acesso: admin</p>

        <div class="logout">
            <a href="painel.php">Voltar ao painel</a> |
            <a href="logout.php">Sair do sistema</a>
        </div>
    </div>
</body>
</html>