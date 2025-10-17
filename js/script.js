function validarFormulario() {
    let usuario = document.getElementById("usuario");
    let produto = document.getElementById("produto");
    let quantidade = document.getElementById("quantidade");
    let data = document.getElementById("data");

    let regexNome = /^[A-Za-zÀ-ÿ\s]{3,}$/;
    let regexNumero = /^[0-9]+$/;
    let regexData = /^\d{2}\/\d{2}\/\d{4}$/;

    if (usuario && usuario.value.trim() === "") {
        alert("Preencha o campo Nome de Usuário!");
        usuario.focus();
        return false;
    } else if (usuario && !regexNome.test(usuario.value.trim())) {
        alert("O nome de usuário deve conter apenas letras e ter pelo menos 3 caracteres.");
        usuario.focus();
        return false;
    }

    if (produto && produto.value.trim() === "") {
        alert("Preencha o campo Nome do Produto!");
        produto.focus();
        return false;
    } else if (produto && !regexNome.test(produto.value.trim())) {
        alert("O nome do produto deve conter apenas letras e ter pelo menos 3 caracteres.");
        produto.focus();
        return false;
    }

    if (quantidade && quantidade.value.trim() === "") {
        alert("Preencha o campo Quantidade!");
        quantidade.focus();
        return false;
    } else if (quantidade && !regexNumero.test(quantidade.value.trim())) {
        alert("A quantidade deve conter apenas números.");
        quantidade.focus();
        return false;
    }

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
