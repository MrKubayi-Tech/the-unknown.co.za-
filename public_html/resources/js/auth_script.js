const sign_up_btn = document.getElementById('signup_btn');
const login_btn = document.getElementById('login_btn');
const sign_up_tab = document.getElementById('singup_tab');
const login_tab = document.getElementById('login_tab');
const sign_up = document.getElementById('signup');
const login = document.getElementById('login');

sign_up_btn.addEventListener('click', () => {
    login.classList.toggle('hide');
    login_tab.classList.toggle('hide_tab');
    sign_up_tab.classList.toggle('show_tab');
    sign_up.classList.toggle('show');
});

login_btn.addEventListener('click', () => {
    login.classList.toggle('hide');
    login_tab.classList.toggle('hide_tab');
    sign_up_tab.classList.toggle('show_tab');
    sign_up.classList.toggle('show');
});