document.addEventListener('DOMContentLoaded', function () {
    const toggleSenha1 = document.getElementById('toggleSenha1');
    const senha1 = document.getElementById('senha1');
    const toggleSenha2 = document.getElementById('toggleSenha2');
    const senha2 = document.getElementById('senha2');
    const form = document.querySelector('form');
    const validador = document.querySelector('.validador-senha');

    const requisitos = {
        comprimento: document.getElementById('comprimento'),
        maiuscula: document.getElementById('maiuscula'),
        numero: document.getElementById('numero'),
        especial: document.getElementById('especial'),
        igual: document.getElementById('igual')
    };

    // Mostrar/Ocultar senha
    toggleSenha1.addEventListener('click', function () {
        const type = senha1.getAttribute('type') === 'password' ? 'text' : 'password';
        senha1.setAttribute('type', type);
        this.classList.toggle('bi-eye');
    });

    toggleSenha2.addEventListener('click', function () {
        const type = senha2.getAttribute('type') === 'password' ? 'text' : 'password';
        senha2.setAttribute('type', type);
        this.classList.toggle('bi-eye');
    });

    // Validação de confirmação de senha
    form.addEventListener('submit', function (event) {
        if (senha1.value !== senha2.value) {
            event.preventDefault();
            alert('As senhas não coincidem. Por favor, verifique e tente novamente.');
        }
    });

    // Validação em tempo real
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

        if (comprimentoValido && maiusculaValido && numeroValido && especialValido && igualValido) {
            validador.classList.remove('visivel');
        } else {
            validador.classList.add('visivel');
        }
    }

    senha1.addEventListener('input', validarSenha);
    senha2.addEventListener('input', validarSenha);
});

// Máscara de CPF
document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    e.target.value = value;
});
