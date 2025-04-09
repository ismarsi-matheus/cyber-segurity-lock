document.addEventListener('DOMContentLoaded', () => {
    const menuIcon = document.querySelector('.menu-icon');
    const dropdownMenu = document.getElementById('dropdownMenu');

    menuIcon.addEventListener('click', () => {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    // Adicionando eventos para os botões do menu
    document.getElementById('filterAZ').addEventListener('click', () => {
        
        dropdownMenu.style.display = 'none'; // Fecha o menu após a seleção
    });

    document.getElementById('filterDate').addEventListener('click', () => {
        
        dropdownMenu.style.display = 'none'; // Fecha o menu após a seleção
    });

    // Fecha o menu se clicar fora dele
    window.addEventListener('click', (event) => {
        if (!menuIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const filterAZ = document.getElementById("filterAZ");
    const filterDate = document.getElementById("filterDate");

    if (filterAZ) {
        filterAZ.addEventListener("click", () => {
            window.location.href = "tela_inicial.php?order=az";
        });
    }

    if (filterDate) {
        filterDate.addEventListener("click", () => {
            window.location.href = "tela_inicial.php?order=data";
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const input = document.querySelector("input[name='pesquisa']");
    const listaSenhas = document.querySelector(".lista-senhas");

    if (input && listaSenhas) {
        input.addEventListener("keyup", function () {
            const valor = input.value;
            const order = new URLSearchParams(window.location.search).get("order") || "az";

            fetch(`buscar_senhas.php?pesquisa=${encodeURIComponent(valor)}&order=${order}`)
                .then(res => res.text())
                .then(html => {
                    listaSenhas.innerHTML = html;
                })
                .catch(error => console.error("Erro na pesquisa:", error));
        });
    }
});


