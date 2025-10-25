<?php
function voltar(){
    echo "<h2 class='link-home'><a href='index.html'>Página Inicial</a></h2>";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Usuário</title>
    <link rel="stylesheet" href="css/stylephp.css">
</head>
<body>
    <header>
        <h1>Cadastro de Usuário</h1>
    </header>

    <div class="container formulario1">
        <?php
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $nome = $_POST["nome"];
            $idade = $_POST["idade"];

            // Nome sem espaços extras
            echo "<h2 class='resultado'>Nome: " . trim($nome) . "</h2><br>"; 

            // Validação do campo idade
            if(empty($idade)){
                echo "<h2 class='resultado'>Digite sua idade.</h2><br>";
            } else {
                echo "<h2 class='resultado'>Idade: " . $idade . "</h2><br>";
            }

            // Verificação de variável indefinida
            if(!isset($funcao)){
                echo "<h2 class='resultado'>Variável não definida.</h2><br>";
            }

            voltar();
        }
        ?>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Meu Sistema de Usuários
    </footer>
</body>
</html>
