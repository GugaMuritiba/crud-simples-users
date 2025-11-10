<?php
if (isset($_SESSION['msg'])) {
    echo '<script>alert("' . $_SESSION['msg'] . '");</script>';
    unset($_SESSION['msg']);
}

$cities = $data['cities'];
$id_city_choosed = $data['id_city'];

if ($id_city_choosed) {
    foreach ($cities as $city) {
        if ($city->id_city == $id_city_choosed) {
            $cities_choosed = $city;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Cidade</title>
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
        <h1>Atualização de Cidade <br> </h1>

        <form action="/update_city" method="POST">

            <div class="form-group">
                <label for="id_city">Id da cidade</label>
                <input type="id_city" id="id_city" name="id_city" value="<?php echo "$cities_choosed->id_city" ?>" readonly>
            </div>

            <div class="form-group">
                <label for="city">Nome da cidade</label>
                <input type="city" id="city" name="city" value="<?php echo "$cities_choosed->city" ?>">
            </div>

            <div class="form-group">
                <label for="state">Estado</label>
                <select id="state" name="state" required>
                    <option value=""><?php echo "$city->state" ?></option>
                    <?php
                    echo '<option value="AC">Acre</option>';
                    echo '<option value="AL">Alagoas</option>';
                    echo '<option value="AP">Amapá</option>';
                    echo '<option value="AM">Amazonas</option>';
                    echo '<option value="BA">Bahia</option>';
                    echo '<option value="CE">Ceará</option>';
                    echo '<option value="DF">Distrito Federal</option>';
                    echo '<option value="ES">Espírito Santo</option>';
                    echo '<option value="GO">Goiás</option>';
                    echo '<option value="MA">Maranhão</option>';
                    echo '<option value="MT">Mato Grosso</option>';
                    echo '<option value="MS">Mato Grosso do Sul</option>';
                    echo '<option value="MG">Minas Gerais</option>';
                    echo '<option value="PA">Pará</option>';
                    echo '<option value="PB">Paraíba</option>';
                    echo '<option value="PR">Paraná</option>';
                    echo '<option value="PE">Pernambuco</option>';
                    echo '<option value="PI">Piauí</option>';
                    echo '<option value="RJ">Rio de Janeiro</option>';
                    echo '<option value="RN">Rio Grande do Norte</option>';
                    echo '<option value="RS">Rio Grande do Sul</option>';
                    echo '<option value="RO">Rondônia</option>';
                    echo '<option value="RR">Roraima</option>';
                    echo '<option value="SC">Santa Catarina</option>';
                    echo '<option value="SP">São Paulo</option>';
                    echo '<option value="SE">Sergipe</option>';
                    echo '<option value="TO">Tocantins</option>';
                    ?>
                    </option>
                </select>
            </div>

            <button type="submit" class="btn">Atualizar</button>
        </form>
        <div class="footer">
            <p>Quer cancelar a atualização? <a href="/cities">VOLTAR</a></p>
        </div>
        <div class="footer">
            <p>Menu principal <a href="/dashboard">VOLTAR</a></p>
        </div>
    </div>

</body>

</html>