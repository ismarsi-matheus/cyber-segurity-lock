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
});

const senha1 = document.getElementById('senha1');
const senha2 = document.getElementById('senha2');
const validador = document.querySelector('.validador-senha');

const requisitos = {
    comprimento: document.getElementById('comprimento'),
    maiuscula: document.getElementById('maiuscula'),
    numero: document.getElementById('numero'),
    especial: document.getElementById('especial'),
    igual: document.getElementById('igual'),
};

function validarSenha() {
    const valor = senha1.value;
    const regexMaiuscula = /[A-Z]/;
    const regexNumero = /[0-9]/;
    const regexEspecial = /[!@#$%^&*(),.?":{}|<>]/;

    if (valor.length > 0 || senha2.value.length > 0) {
        validador.classList.add('visivel');
    } else {
        validador.classList.remove('visivel');
    }

    const comprimentoValido = valor.length >= 8;
    const maiusculaValido = regexMaiuscula.test(valor);
    const numeroValido = regexNumero.test(valor);
    const especialValido = regexEspecial.test(valor);
    const igualValido = valor === senha2.value && valor.length > 0;

    requisitos.comprimento.textContent = comprimentoValido ? "✔ Mínimo 8 caracteres" : "✘ Mínimo 8 caracteres";
    requisitos.comprimento.style.color = comprimentoValido ? "#0f0" : "#f00";

    requisitos.maiuscula.textContent = maiusculaValido ? "✔ Contém letra maiúscula" : "✘ Precisa de letra maiúscula";
    requisitos.maiuscula.style.color = maiusculaValido ? "#0f0" : "#f00";

    requisitos.numero.textContent = numeroValido ? "✔ Contém número" : "✘ Precisa de número";
    requisitos.numero.style.color = numeroValido ? "#0f0" : "#f00";

    requisitos.especial.textContent = especialValido ? "✔ Contém caractere especial" : "✘ Precisa de caractere especial";
    requisitos.especial.style.color = especialValido ? "#0f0" : "#f00";

    requisitos.igual.textContent = igualValido ? "✔ Senhas coincidem" : "✘ Senhas não coincidem";
    requisitos.igual.style.color = igualValido ? "#0f0" : "#f00";

    // Esconder o validador de senha se todas as condições forem atendidas
    if (comprimentoValido && maiusculaValido && numeroValido && especialValido && igualValido) {
        validador.classList.remove('visivel');
    } else {
        validador.classList.add('visivel');
    }
}

senha1.addEventListener('input', validarSenha);
senha2.addEventListener('input', validarSenha);