function validarBotaoPermitido() {//função para iniciar o php caso um dos dois botões seja selecionado
    let botao = document.activeElement.value;

    if (botao === "Mostrar" || botao === "Limpar lista") {
        return true;
    } else {
        return false;
    }
}

let regexNome = /^[A-Za-zÀ-ÿ\s]{3,}$/;

function validarFormulario(){
    
    if (validarBotaoPermitido()) {
        return true;
    }

    let usuario = document.getElementById("usuario");
    if (usuario && usuario.value.trim() === "") {
        alert("Preencha o campo Nome de Usuário!");
        usuario.focus();
        return false;
    } else if (usuario && !regexNome.test(usuario.value.trim())) {
        alert("O nome de usuário deve conter apenas letras e ter pelo menos 3 caracteres.");
        usuario.focus();
        return false;
    }    
}

function validarFormulario2() {
    
    if (validarBotaoPermitido()) {
        return true;
    }

    let produto = document.getElementById("produto");
    if (produto && produto.value.trim() === "") {
        alert("Preencha o campo Nome do Produto!");
        produto.focus();
        return false;
    } else if (produto && !regexNome.test(produto.value.trim())) {
        alert("O nome do produto deve conter apenas letras e ter pelo menos 3 caracteres.");
        produto.focus();
        return false;
    }

    let quantidade = document.getElementById("quantidade");
    let regexNumero = /^[0-9]+$/;    

    if (quantidade && quantidade.value.trim() === "") {
        alert("Preencha o campo Quantidade!");
        quantidade.focus();
        return false;
    } else if (quantidade && !regexNumero.test(quantidade.value.trim())) {
        alert("A quantidade deve conter apenas números.");
        quantidade.focus();
        return false;
    }

    let data = document.getElementById("data");
    let regexData = /^\d{2}\/\d{2}\/\d{4}$/;

    if (data && data.value.trim() === "") {
        alert("Preencha o campo Data!");
        data.focus();
        return false;
    } else if (data && !regexData.test(data.value.trim())) {
        alert("A data deve estar no formato DD/MM/AAAA.");
        data.focus();
        return false;
    }

    return true;
}

document.addEventListener("DOMContentLoaded", function() {
    let campoData = document.getElementById("data");

    if (campoData) {
        campoData.addEventListener("input", function(e) {
            let valor = e.target.value.replace(/\D/g, "");
            if (valor.length > 2 && valor.length <= 4) {
                valor = valor.replace(/(\d{2})(\d+)/, "$1/$2");
            } else if (valor.length > 4) {
                valor = valor.replace(/(\d{2})(\d{2})(\d+)/, "$1/$2/$3");
            }
            e.target.value = valor;
        });
    }
});
