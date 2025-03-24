document.addEventListener('DOMContentLoaded', function() {
    const toggleSenha1 = document.getElementById('toggleSenha1');
    const senha1 = document.getElementById('senha1');
    const toggleSenha2 = document.getElementById('toggleSenha2');
    const senha2 = document.getElementById('senha2');
    const form = document.querySelector('form');

    // Mostrar/Ocultar senha
    toggleSenha1.addEventListener('click', function() {
        const type = senha1.getAttribute('type') === 'password' ? 'text' : 'password';
        senha1.setAttribute('type', type);
        this.classList.toggle('bi-eye');
    });

    toggleSenha2.addEventListener('click', function() {
        const type = senha2.getAttribute('type') === 'password' ? 'text' : 'password';
        senha2.setAttribute('type', type);
        this.classList.toggle('bi-eye');
    });

    // Validação de confirmação de senha
    form.addEventListener('submit', function(event) {
        if (senha1.value !== senha2.value) {
            event.preventDefault();
            alert('As senhas não coincidem. Por favor, verifique e tente novamente.');
        }
    });
});