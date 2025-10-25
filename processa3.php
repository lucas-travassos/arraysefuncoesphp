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
    <title>Soma de Números</title>
    <link rel="stylesheet" href="css/stylephp.css">
</head>
<body>
    <header>
        <h1>Calculadora de Soma</h1>
    </header>

    <div class="container formulario1">
        <?php
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];

            function soma($num1, $num2) {
                $resultado = $num1 + $num2;
                echo "<h2 class='resultado'>A soma de $num1 e $num2 é: $resultado</h2><br>";
            }

            soma($numero1, $numero2);

            voltar();
        }
        ?>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Minha Calculadora
    </footer>
</body>
</html>
