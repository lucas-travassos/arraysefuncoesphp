<?php
//inicia sessão que possibilita guardar dados a cada requisição;
session_start(); 

//retorna verdadeiro caso a variável $_SESSION["itens"] ainda não exista (primeiro acesso do usuário);
if (!isset($_SESSION["itens"])) { 
    //cria o array. Se for falso, executa o restante do código sem alterar o array vigente;
    $_SESSION["itens"] = array(); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //validação de segurança, só executa após envio do formulário
    $acao2 = $_POST["acao2"] ?? ""; //captura o valor enviado pelo campo "acao2" do formulário, se não existir, define como string vazia

      if ($acao2 == "Enviar") { // Se o botão clicado tiver valor "Enviar", entra neste bloco.
        // Captura e remove espaços extras dos valores recebidos do formulário.
        $produto = trim($_POST["produto"]);
        $quantidade = trim($_POST["quantidade"]);
        $data = trim($_POST["data"]);

        // Verifica se todos os campos obrigatórios foram preenchidos.
        if ($produto != "" && $quantidade != "" && $data != "") {
            // Adiciona os dados do produto ao array de sessão "itens".
            // Cada item é um array associativo com as chaves: produto, quantidade e data.
            $_SESSION["itens"][] = array(
                "produto" => $produto,
                "quantidade" => $quantidade,
                "data" => $data);
                // Mensagem de confirmação e link para voltar à página inicial.
                echo "<h3>Produto adicionado com sucesso!</h3>";
                echo '<a href="index.html">Voltar</a>';

            } else {
                // Caso algum campo esteja vazio, exibe mensagem de erro e link para voltar.
                echo "<p>Preencha todos os campos!</p>";
                echo '<a href="index.html">Voltar</a>';
            }
        }

        if ($acao2 == "Mostrar") { // Se o botão clicado tiver valor "Mostrar", entra neste bloco.
            echo "<h2>Lista de Produtos</h2>";

            // Verifica se há itens armazenados na sessão.
            if (count($_SESSION["itens"]) > 0) {
                echo "<ul>";
                // Percorre todos os itens da lista armazenada na sessão.
                foreach ($_SESSION["itens"] as $item) {
                    echo "<li>" . htmlspecialchars($item["produto"]) . " - Quantidade: " . htmlspecialchars($item["quantidade"]) . " - Data: " . htmlspecialchars($item["data"]) . "</li>";
                }
                echo "</ul>";

        } else {
            // Caso a lista esteja vazia, informa que ainda não há produtos cadastrados.
            echo "<p>Nenhum produto cadastrado ainda.</p>";
        }

        // Link para retornar à página inicial.
        echo '<a href="index.html">Voltar</a>';
    }

    if ($acao2 == "Limpar lista") { // Se o botão clicado tiver valor "Limpar lista", entra neste bloco.
        $_SESSION["itens"] = array(); // Redefine o array da sessão como vazio, apagando todos os produtos.
        echo "<h3>Lista apagada!</h3>";
        echo '<a href="index.html">Voltar</a>';
    }
}
?>