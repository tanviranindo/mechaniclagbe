const password = document.querySelector('#password');


const confirmpassword = document.querySelector('#confirmpassword');

if (document.querySelector('#togglePassword') != null) {
    document.querySelector('#togglePassword').addEventListener('click', function () {
        password.setAttribute('type', password.getAttribute('type') === 'password' ? 'text' : 'password');
        this.classList.toggle('bi-eye');
    });
}

if (document.querySelector('#togglePassword1') != null) {
    document.querySelector('#togglePassword1').addEventListener('click', function () {
        confirmpassword.setAttribute('type', confirmpassword.getAttribute('type') === 'password' ? 'text' : 'password');
        this.classList.toggle('bi-eye');
    });
}

window.addEventListener('scroll', function () {
    const header = document.querySelector('.header');
    header.classList.toggle('sticky', window.scrollY > 0);
});

const menuBtn = document.querySelector('.menu-btn');
const navigation = document.querySelector('.navigation');
const navigationItems = document.querySelectorAll('.navigation a')

menuBtn.addEventListener('click', () => {
    menuBtn.classList.toggle('active');
    navigation.classList.toggle('active');
});

navigationItems.forEach((navigationItem) => {
    navigationItem.addEventListener('click', () => {
        menuBtn.classList.remove('active');
        navigation.classList.remove('active');
    });
});

const scrollBtn = document.querySelector('.scrollToTop-btn');


if (scrollBtn != null) {

    window.addEventListener('scroll', function () {
        scrollBtn.classList.toggle('active', window.scrollY > 500);
    });
    scrollBtn.addEventListener('click', () => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });

    window.addEventListener('scroll', reveal);
}


function reveal() {
    const reveals = document.querySelectorAll('.reveal');

    for (let i = 0; i < reveals.length; i++) {
        const windowHeight = window.innerHeight;
        const revealTop = reveals[i].getBoundingClientRect().top;
        const revealPoint = 50;

        if (revealTop < windowHeight - revealPoint) {
            reveals[i].classList.add('active');
        }
    }
}

