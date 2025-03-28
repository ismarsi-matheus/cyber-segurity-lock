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

document.addEventListener('DOMContentLoaded', function() {
    const userInput = document.getElementById('user');
    const passwordInput = document.getElementById('senha1');
    const rememberCheckbox = document.querySelector('input[name="lembrar_senha"]');

    // Verificar se o localStorage tem valores salvos
    if (localStorage.getItem('remember') === 'true') {
        userInput.value = localStorage.getItem('username');
        passwordInput.value = localStorage.getItem('password');
        rememberCheckbox.checked = true;
    }

    // Atualizar localStorage quando o checkbox mudar
    rememberCheckbox.addEventListener('change', function() {
        if (this.checked) {
            localStorage.setItem('remember', 'true');
            localStorage.setItem('username', userInput.value);
            localStorage.setItem('password', passwordInput.value);
        } else {
            localStorage.setItem('remember', 'false');
            localStorage.removeItem('username');
            localStorage.removeItem('password');
        }
    });

    // Atualizar localStorage quando o usuário ou senha mudar
    userInput.addEventListener('input', function() {
        if (rememberCheckbox.checked) {
            localStorage.setItem('username', userInput.value);
        }
    });

    passwordInput.addEventListener('input', function() {
        if (rememberCheckbox.checked) {
            localStorage.setItem('password', passwordInput.value);
        }
    });
});