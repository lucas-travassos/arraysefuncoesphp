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
    <title>Alunos Selecionados</title>
    <link rel="stylesheet" href="css/stylephp.css">
</head>
<body>
    <header>
        <h1>Dados do Aluno</h1>
    </header>

    <div class="container formulario1">
        <?php
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $linha = intval($_POST["num1"]);  // quantas linhas mostrar

            $alunos = array(
                array("João", 18, "Informática"),
                array("Maria", 19, "Administração"),
                array("Pedro", 20, "Contabilidade")
            );

            // Verificação básica para evitar índice inválido
            if($linha >= 0 && $linha < count($alunos)) {
                // Percorre as colunas da linha selecionada
                foreach($alunos[$linha] as $coluna){
                    echo "<h2 class='resultado'>{$coluna}</h2>";
                    echo "<br>";
                }
            } else {
                echo "<h2 class='resultado'>Linha inválida! Selecione entre 0 e 2.</h2>";
            }

            voltar();
        }
        ?>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Minha Aplicação de Alunos
    </footer>
</body>
</html>
