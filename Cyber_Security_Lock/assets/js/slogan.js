const frases = [
    "Segurança total para suas senhas.",
    "Codificação avançada na palma da sua mão.",
    "Proteja o que é importante.",
    "Gerencie com tranquilidade.",
    "Seu cofre digital pessoal."
];

const sloganElement = document.querySelector(".slogan");
let fraseIndex = 0;
let charIndex = 0;
let escrevendo = true;

function atualizarTexto() {
    const fraseAtual = frases[fraseIndex];

    if (escrevendo) {
        sloganElement.textContent = fraseAtual.substring(0, charIndex++) + "|";
        if (charIndex > fraseAtual.length) {
            escrevendo = false;
            setTimeout(atualizarTexto, 2500); // espera 2.5s antes de apagar
        } else {
            setTimeout(atualizarTexto, 80); // velocidade de digitação
        }
    } else {
        sloganElement.textContent = fraseAtual.substring(0, charIndex--) + "|";
        if (charIndex < 0) {
            escrevendo = true;
            fraseIndex = (fraseIndex + 1) % frases.length;
            setTimeout(atualizarTexto, 500); // pequena pausa antes de digitar a próxima
        } else {
            setTimeout(atualizarTexto, 40); // velocidade de apagar
        }
    }
}

atualizarTexto();
