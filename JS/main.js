const pwdShowToggle = document.querySelector('#pwdShowToggle');
const pwdInput = document.querySelector('#signUpPassword');

function showToggle() {
    pwdShowToggle.children[0].classList == 'fas fa-eye' ? pwdShowToggle.children[0].classList = 'fas fa-eye-slash' : pwdShowToggle.children[0].classList = 'fas fa-eye';
    pwdInput.type == 'password' ? pwdInput.type = 'text' : pwdInput.type = 'password';
}

pwdShowToggle.addEventListener("click", showToggle);