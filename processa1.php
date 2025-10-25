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
    <title>Frutas Selecionadas</title>
    <!-- Conexão com o CSS externo -->
    <link rel="stylesheet" href="css/stylephp.css">
</head>
<body>
    <header>
        <h1>Seleção de Frutas</h1>
    </header>

    <div class="container formulario1">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $posicao = $_POST['posicao'];
            $frutas = array("Maçã", "Banana", "Laranja", "Uva");

            // Verificação básica para evitar erros de índice
            if (isset($frutas[$posicao])) {
                echo "<h2 class='resultado'>A fruta selecionada foi: {$frutas[$posicao]}</h2>";
            } else {
                echo "<h2 class='resultado'>Posição inválida! Selecione entre 0 e 3.</h2>";
            }

            voltar();
        }
        ?>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Minha Aplicação de Frutas
    </footer>
</body>
</html>
