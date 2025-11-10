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
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 15px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .card h3 {
            margin: 0 0 10px;
        }

        .card p {
            color: #555;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .card a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Bem-vindo ao Dashboard, <?php echo $_SESSION['name_user'] ?>!</h1>
        <p>Gerencie suas opções de forma prática e rápida</p>
    </div>

    <div class="container">
        <div class="card">
            <h3>Usuários</h3>
            <p>Gerencie os usuários do sistema</p>
            <a href="/users">Acessar</a>
        </div>

        <div class="container">
            <div class="card">
                <h3>Cidades</h3>
                <p>Gerencie as cidades dos usuários</p>
                <a href="/cities">Acessar</a>
            </div>

            <div class="card">
                <h3>Sair</h3>
                <a href="/logout">Logout</a>
            </div>
        </div>
</body>

</html>