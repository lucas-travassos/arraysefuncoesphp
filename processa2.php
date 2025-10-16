<?php
session_start();

if (!isset($_SESSION["itens"])) {
    $_SESSION["itens"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST["acao"] ?? "";
