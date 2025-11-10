<?php

use Root\Html\models\User;

$users = $data['users'];
//$city = $data['city'];
//dd($city);
if (isset($_SESSION['msg'])) {
    echo '<script>alert("' . $_SESSION['msg'] . '");</script>';
    unset($_SESSION['msg']);
}


echo '<div style="text-align: center; margin: 20px 0;">';
echo '<a href="/dashboard" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">Voltar para o dashboard</a>';
echo '</div>';


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
    <h1>Usuários Ativos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ativo/Inativo</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Cidade</th>
                <th>Nascimento</th>
                <th>Data de Cadastro</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                if (!$user->deleted_user) {
                    echo '<tr>';
                    echo '<td>' . $user->id_user . '</td>';
                    echo '<td>' . ($user->deleted_user ? 'Inativo' : 'Ativo') . '</td>';
                    echo '<td>' . $user->name_user . '</td>';
                    echo '<td>' . $user->email_user . '</td>';
                    echo '<td>' . $user->cpf_user . '</td>';
                    echo '<td>' . $user->city . '</td>';
                    echo '<td>' . $user->birth_user . '</td>';
                    echo '<td>' . $user->date_signup_user . '</td>';
                    echo '<td><a href="/update_user?id=' . $user->id_user . '">Atualizar</a></td>';
                    echo '<td><a href="/delete_user?id=' . $user->id_user . '">Deletar</a></td>';
                    echo '</tr>';
                }
            }
            ?>
        </tbody>
    </table>

    <h1>Usuários Inativos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ativo/Inativo</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Cidade</th>
                <th>Nascimento</th>
                <th>Data de Cadastro</th>
                <th>Atualizar</th>
                <th>Reativar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                if ($user->deleted_user) {
                    echo '<tr>';
                    echo '<td>' . $user->id_user . '</td>';
                    echo '<td>' . ($user->deleted_user ? 'Inativo' : 'Ativo') . '</td>';
                    echo '<td>' . $user->name_user . '</td>';
                    echo '<td>' . $user->email_user . '</td>';
                    echo '<td>' . $user->cpf_user . '</td>';
                    echo '<td>' . $user->city . '</td>';
                    echo '<td>' . $user->birth_user . '</td>';
                    echo '<td>' . $user->date_signup_user . '</td>';
                    echo '<td><a href="/update_user?id=' . $user->id_user . '">Atualizar</a></td>';
                    echo '<td><a href="/reactivate_user?id=' . $user->id_user . '">Ativar</a></td>';
                    echo '</tr>';
                }
            }

            ?>
        </tbody>
    </table>
</body>

</html>