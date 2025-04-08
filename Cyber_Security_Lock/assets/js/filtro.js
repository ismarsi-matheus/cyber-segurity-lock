function aplicarFiltro(tipo) {
    const url = new URL(window.location.href);
    if (tipo === 'az') {
        url.searchParams.set('order', 'az');
    } else if (tipo === 'data') {
        url.searchParams.set('order', 'data');
    }
    window.location.href = url.toString();
}
