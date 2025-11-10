<?php

$cities = $data['cities'];
//dd($cities);
if (isset($_SESSION['msg'])) {
    echo '<script>alert("' . $_SESSION['msg'] . '");</script>';
    unset($_SESSION['msg']);
}

echo '<div style="text-align: center; margin: 20px 0;">';
echo '<a href="/add_city" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">Adicionar Cidade</a>';
echo '</div>';

echo '<div style="text-align: center; margin: 20px 0;">';
echo '<a href="/dashboard" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">Voltar para o dashboard</a>';
echo '</div>';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidades</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Cidades</h1>
    <table>
        <thead>
            <tr>
                <th>ID da Cidade</th>
                <th>Estado</th>
                <th>Nome da cidade</th>
                <th>Atualizar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cities as $cities) {

                echo '<tr>';
                echo '<td>' . $cities->id_city . '</td>';
                echo '<td>' . $cities->state . '</td>';
                echo '<td>' . $cities->city . '</td>';
                echo '<td><a href="/update_city?id_city=' . $cities->id_city . '">Atualizar</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>