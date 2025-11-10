<?php
if (isset($_SESSION['msg'])) {
    echo '<script>alert("' . $_SESSION['msg'] . '");</script>';
    unset($_SESSION['msg']);
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <div class="container">
        <h1>Bem-vindo ao Sistema de Gerenciamento de Usuários</h1>
        <p>Gerencie seus usuários de forma simples e eficiente.</p>
    </div>
</body>

</html>

<?php

echo '<div style="text-align: center; margin: 20px 0;">';
echo '<a href="/login" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">Login</a>';
echo '</div>';

echo '<div style="text-align: center; margin: 20px 0;">';
echo '<a href="/register" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">Registro</a>';
echo '</div>';



?>