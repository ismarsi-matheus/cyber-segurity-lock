function toggleSenha(idInput, idIcone) {
    let inputSenha = document.getElementById(idInput);
    let icone = document.getElementById(idIcone);

    if (inputSenha.type === "password") {
        inputSenha.type = "text";
        icone.classList.remove("bi-eye-slash");
        icone.classList.add("bi-eye");
    } else {
        inputSenha.type = "password";
        icone.classList.remove("bi-eye");
        icone.classList.add("bi-eye-slash");
    }
}

// Adiciona eventos para os dois campos de senha
document.getElementById("toggleSenha1").addEventListener("click", function () {
    toggleSenha("senha1", "toggleSenha1");
});

document.getElementById("toggleSenha2").addEventListener("click", function () {
    toggleSenha("senha2", "toggleSenha2");
});



document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    e.target.value = value;
});