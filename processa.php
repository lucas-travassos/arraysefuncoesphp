<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Ação</title>
    <link rel="stylesheet" href="css/stylephp.css">
</head>
<body>

    <header>
        <h1>Sistema de Nomes</h1>
    </header>

    <div class="container">
        <div class="card">
            <?php

            function exibirMensagem($texto, $tipo = 'info'){
                echo "<div class='mensagem $tipo'>$texto</div>";
                echo "<a href='index.html' class='btn-voltar'>Voltar</a>";
            }

            if (!isset($_SESSION["usuario"])) {
                $_SESSION["usuario"] = array();
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $acao = $_POST["acao"] ?? "";

                if ($acao == "Enviar") {

                    $usuario = trim($_POST["usuario"]);

                    // if ($usuario != ""){
                        if  (!empty($usuario)) {

                        $_SESSION["usuario"][] = array("usuario" => $usuario);

                        // echo "<h3>Nome adicionado com sucesso!</h3>";
                        // echo '<a href="index.html">Voltar</a>';
                        exibirMensagem("Nome adicionado com sucesso!", "sucesso");
                    
                    }else{
                        // echo "<p>Preencha todos os campos!</p>";
                        // echo '<a href="index.html">Voltar</a>';  
                        exibirMensagem("Preencha todos os campos!", "erro"); 
                    }
                }

                if ($acao == "Mostrar") { 
                    echo "<h2 class='titulo'>Lista de Usuários</h2>";

                    if (count($_SESSION["usuario"]) > 0) {
                        echo "<ul class='lista-produtos'>";
                    
                        foreach ($_SESSION["usuario"] as $usuario) {
                            echo "<li>" . htmlspecialchars($usuario["usuario"]) . "</li>";
                        }
                        echo "</ul>";

                    } else {
                    
                        echo "<div class='mensagem info'>Nenhum nome cadastrado ainda.</div>";
                    }

                    echo '<a href="index.html" class="btn-voltar">Voltar</a>';
                }

                if ($acao == "Limpar lista") { 
                    $_SESSION["usuario"] = array(); 
                    // echo "<h3>Lista apagada!</h3>";
                    // echo '<a href="index.html">Voltar</a>';
                    exibirMensagem("Lista apagada!", "alerta");
                }
                
            } else {
                exibirMensagem("Nenhuma ação foi enviada.", "erro");
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> - Sistema de Produtos</p>
    </footer>

</body>
</html>