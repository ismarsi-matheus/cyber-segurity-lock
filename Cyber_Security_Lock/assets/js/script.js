document.getElementById("toggleSenha").addEventListener("click", function () {
    let inputSenha = document.getElementById("senha");
    let icone = document.getElementById("toggleSenha");

    // Alterna entre "password" e "text"
    if (inputSenha.type === "password") {
        inputSenha.type = "text";
        icone.classList.remove("bi-eye-slash"); // Remove ícone de olho fechado
        icone.classList.add("bi-eye"); // Adiciona ícone de olho aberto
    } else {
        inputSenha.type = "password";
        icone.classList.remove("bi-eye"); // Remove ícone de olho aberto
        icone.classList.add("bi-eye-slash"); // Adiciona ícone de olho fechado
    }
});