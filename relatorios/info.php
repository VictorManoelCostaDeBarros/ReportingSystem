<?php 
    $mysql = new PDO('mysql:host=localhost;dbname=relatorios','root','');

    $info = $mysql->prepare("SELECT * FROM relatorio");
    $info->execute();

    $info = $info->fetchAll();

    die(json_encode($info));
?>