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

            } else {
                echo "<p>Preencha todos os campos!</p>";
                echo '<a href="index.html">Voltar</a>';
            }
        }

        if ($acao == "Mostrar Lista") {
            echo "<h2>Lista de Produtos</h2>";

            if (count($_SESSION["itens"]) > 0) {
                echo "<ul>";
                foreach ($_SESSION["itens"] as $item) {
                    echo "<li>" . htmlspecialchars($item["produto"]) . " - Quantidade: " . htmlspecialchars($item["quantidade"]) . " - Data: " . htmlspecialchars($item["data"]) . "</li>";
                }
                echo "</ul>";

        } else {
            echo "<p>Nenhum produto cadastrado ainda.</p>";
        }

        echo '<a href="index.html">Voltar</a>';
    }

    if ($acao == "Limpar lista") {
        $_SESSION["itens"] = array();
        echo "<h3>Lista apagada!</h3>";
        echo '<a href="index.html">Voltar</a>';
    }
}
?>