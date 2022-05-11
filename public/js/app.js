document.querySelector('#nav-expand-button').addEventListener('click', () => {
    document.querySelector('.navbar-left').classList.toggle('open'),
        document.querySelector('.content-container').classList.toggle('padding-container-navbar-expand')
});

document.querySelector('.nav-toggle').addEventListener('click', () => {
    document.querySelector('.nav-container').classList.toggle('is-active')
});
