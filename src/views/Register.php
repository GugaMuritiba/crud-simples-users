<?php
if (isset($_SESSION['msg'])) {
    echo '<script>alert("' . $_SESSION['msg'] . '");</script>';
    unset($_SESSION['msg']);
}

$cities = $data['cities'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #777;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Registro de usuário</h1>
        <form action="/store" method="POST">

            <div class="form-group">
                <label for="name_user">Nome completo</label>
                <input type="text" id="name_user" name="name_user" placeholder="Digite seu nome completo" required>
            </div>

            <div class="form-group">
                <label for="email_user">Email</label>
                <input type="email" id="email_user" name="email_user" placeholder="Digite seu email" required>
            </div>

            <div class="form-group">
                <label for="cpf_user">CPF</label>
                <input type="text" id="cpf_user" name="cpf_user" placeholder="Digite seu email" required>
            </div>

            <!-- <div class="form-group">
                <label for="id_city_user">Cidade</label>
                <input type="text" id="id_city_user" name="id_city_user">
            </div> -->

            <div class="form-group">
                <label for="id_city_user">Cidade</label>
                <select id="id_city_user" name="id_city_user" required>
                    <option value="">Selecione sua cidade</option>
                    <?php

                    foreach ($cities as $city) {
                        echo '<option value="' . $city->id_city . '">' . $city->city . '</option>';
                    }

                    ?>
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="birth_user">Data de Nascimento</label>
                <input type="date" id="birth_user" name="birth_user" required>
            </div>

            <div class="form-group">
                <label for="password_user">Senha</label>
                <input type="password" id="password_user" name="password_user" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>
        <div class="footer">
            <p>Não tem uma conta? <a href="/login">Tem uma conta? Faça login!</a></p>
        </div>
        <div class="footer">
            <p>Menu principal <a href="/">VOLTAR</a></p>
        </div>
    </div>

</body>

</html>