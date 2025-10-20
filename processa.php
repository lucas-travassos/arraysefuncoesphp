<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    $_SESSION["usuario"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $acao = $_POST["acao"] ?? "";

    if ($acao == "Enviar") {

        $usuario = trim($_POST["usuario"]);

        if ($usuario != ""){

            $_SESSION["usuario"][] = array("usuario" => $usuario);

            echo "<h3>Nome adicionado com sucesso!</h3>";
            echo '<a href="index.html">Voltar</a>';
        
        }else{
            echo "<p>Preencha todos os campos!</p>";
            echo '<a href="index.html">Voltar</a>';   
    }
}

if ($acao == "Mostrar") { 
    echo "<h2>Lista de Nomes</h2>";

    if (count($_SESSION["usuario"]) > 0) {
        echo "<ul>";
      
        foreach ($_SESSION["usuario"] as $usuario) {
            echo "<li>" . htmlspecialchars($usuario["usuario"]) . "</li>";
        }
        echo "</ul>";

} else {
    
    echo "<p>Nenhum nome cadastrado ainda.</p>";
}

echo '<a href="index.html">Voltar</a>';
}

if ($acao == "Limpar lista") { 
$_SESSION["usuario"] = array(); 
echo "<h3>Lista apagada!</h3>";
echo '<a href="index.html">Voltar</a>';
}
}
?>
