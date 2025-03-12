document.addEventListener("DOMContentLoaded", function () {
    const toggleIcons = document.querySelectorAll(".toggle-visibility");

    toggleIcons.forEach(icon => {
        icon.addEventListener("click", function () {
            const passwordSpan = this.previousElementSibling; // Pega o <span> da senha

            if (passwordSpan && passwordSpan.classList.contains("password")) {
                const senhaReal = passwordSpan.getAttribute("data-senha"); // Obtém a senha real
                const senhaOculta = "*".repeat(senhaReal.length); // Gera asteriscos do mesmo tamanho

                if (passwordSpan.textContent === senhaOculta) {
                    passwordSpan.textContent = senhaReal; // Mostra a senha real
                    this.classList.replace("bi-eye-slash", "bi-eye"); // Troca o ícone
                } else {
                    passwordSpan.textContent = senhaOculta; // Oculta novamente com asteriscos
                    this.classList.replace("bi-eye", "bi-eye-slash");
                }
            }
        });
    });
});