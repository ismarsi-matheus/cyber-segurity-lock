
document.getElementById('enviarBtn').addEventListener('click', function() {
    const pergunta = document.getElementById('question').value;

    fetch('enviar-pergunta.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'pergunta=' + encodeURIComponent(pergunta),
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Pergunta enviada com sucesso!');
            document.getElementById('question').value = '';
        } else {
            alert('Erro: ' + data.message);
        }
    })
    .catch(err => {
        alert('Erro ao enviar. Tente novamente.');
        console.error(err);
    });
});

