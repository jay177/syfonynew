const open = document.querySelector('.heroLeftImgWrapper');
const burgerRemontes = document.querySelector('.burgerRemontes');
const closeBurger = document.querySelector('.closeBurger');

console.log(open)
open.addEventListener('click', () => {
    burgerRemontes.classList.add('active');
});
closeBurger.addEventListener('click', () => {
    burgerRemontes.classList.remove('active');
});

const navWrapper = document.querySelector('.navWrapper');

window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
        navWrapper.classList.add('scrolled');
    } else {
        navWrapper.classList.remove('scrolled');
    }
});