<?php
session_start();

if (!isset($_SESSION["itens"])) {
    $_SESSION["itens"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST["acao"] ?? "";

      if ($acao == "Enviar") {
        $produto = trim($_POST["produto"]);
        $quantidade = trim($_POST["quantidade"]);
        $data = trim($_POST["data"]);

        if ($produto != "" && $quantidade != "" && $data != "") {
            $_SESSION["itens"][] = array(
                "produto" => $produto,
                "quantidade" => $quantidade,
                "data" => $data);
                echo "<h3>Produto adicionado com sucesso!</h3>";
                echo '<a href="index.html">Voltar</a>';
            }
        }
    }