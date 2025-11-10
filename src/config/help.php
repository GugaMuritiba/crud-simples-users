<?php
session_start();

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}
