// Alternar entre as classes de Sign-in e Sign-up
var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");
var body = document.querySelector("body");

btnSignin.addEventListener("click", function () {
    body.className = "sign-in-js"; 
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";
});
// Obter o modal
var modal = document.getElementById("modalConfirmacao");

// Obter o botão que abre o modal
var btn = document.getElementById("btnConfirmarCodigo");

// Obter o elemento <span> que fecha o modal
var span = document.getElementById("fecharModal");

// Quando o usuário clicar em "Confirmar Código", abre o modal
if (window.location.search.includes("success")) {
    modal.style.display = "block"; // Exibe o modal
}

// Quando o usuário clicar no botão <span> (x), fecha o modal
span.onclick = function() {
    modal.style.display = "none";
}

// Quando o usuário clica fora do modal, ele fecha
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Adicionar funcionalidade para confirmar o código
document.getElementById("btnConfirmarCodigo").onclick = function() {
    var codigo = document.getElementById("codigoConfirmacao").value;
    // Aqui você pode adicionar a lógica para verificar o código
    if (codigo.length === 6) {
        // Lógica para verificar o código
        alert("Código confirmado!"); // Exemplo de ação
        modal.style.display = "none"; // Fecha o modal
    } else {
        alert("Por favor, insira um código válido.");
    }
}
