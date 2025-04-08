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

