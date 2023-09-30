import * as Popper from '@popperjs/core'
window.Popper = Popper

import 'bootstrap';
import '../sass/app.scss';

document.querySelectorAll('[data-search]').forEach((search) => {

    let table = document.getElementById(search.dataset.search);
    let counter = document.getElementById('counter');

    if (table === null) {
        console.error('Table ' + search.dataset.search + ' not found.');
    }

    if (counter === null) {
        console.error('#counter not found in document.');
    }

    search.addEventListener('input', (e) => {
        let query = e.target.value.toLowerCase();
        let i = 0;
        table.querySelectorAll('tbody tr').forEach((item) => {
            if (item.dataset.searchValue.indexOf(query) > -1) {
                item.classList.remove('d-none');
                i++;
            } else {
                item.classList.add('d-none');
            }
        })
        counter.innerText = i.toString();
    });

});

window.confirmModal = (e) => {
    if (!confirm(e.currentTarget.dataset.confirm)) {
        e.preventDefault();
    }
}

document.querySelectorAll('[data-confirm]').forEach((elem) => {
    elem.addEventListener('click', window.confirmModal);
});

document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(elem => new bootstrap.Tooltip(elem, {container: 'body'}));
