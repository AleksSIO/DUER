const regexNom = /^[A-Z]+$/;
const regexPrenom = /^[A-Z][a-z]*$/;
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

const input_nom = document.querySelector('#nom');
const input_prenom = document.querySelector('#prenom');
const input_email = document.querySelector('#email');
const btn = document.querySelector('#next');

input_nom.addEventListener('input', verifNom);
input_prenom.addEventListener('input', verifPrenom);
input_email.addEventListener('input', verifEmail);

if (verifNom && verifPrenom && verifEmail){
    btn.removeAttribute('disabled');
}

function verifNom() {
    const nomValide = regexNom.test(input_nom.value.trim());

    if (input_nom.value.trim() === '') {
        btn.setAttribute('disabled', true);
        return false;
    } else if (!nomValide) {
        btn.setAttribute('disabled', true);
        stateSwitch('nom', 'error-input');
        return false;
    } else {
        stateSwitch('nom', 'valid-input');
        return true;
    }
}

function verifPrenom() {

    const prenomValide = regexPrenom.test(input_prenom.value.trim());


    if (input_prenom.value.trim() === '') {
        btn.setAttribute('disabled', true);
        return false;
    } else if (!prenomValide) {
        btn.setAttribute('disabled', true);
        stateSwitch('prenom', 'error-input');
        return false;
    } else {
        stateSwitch('prenom', 'valid-input');
        return true;
    }
}

function verifEmail() {

    const emailValide = regexEmail.test(input_email.value.trim());

    if (input_email.value.trim() === '') {
        btn.setAttribute('disabled', true);
        return false;
    } else if (!emailValide) {
        btn.setAttribute('disabled', true);
        stateSwitch('email', 'error-input');
        return false;
    } else {
        stateSwitch('email', 'valid-input');
        return true;
    }
}

function checkFormValidity() {
    if (verifNom() && verifPrenom() && verifEmail()) {
        btn.removeAttribute('disabled');
    } else {
        btn.setAttribute('disabled', true);
    }
}

input_nom.addEventListener('input', checkFormValidity);
input_prenom.addEventListener('input', checkFormValidity);
input_email.addEventListener('input', checkFormValidity);

checkFormValidity();

function stateSwitch(index, state) {
    switch (index) {
        case 'nom':
            input_nom.classList.remove('valid-input', 'error-input');
            input_nom.classList.add(state);
            break;
        case 'prenom':
            input_prenom.classList.remove('valid-input', 'error-input');
            input_prenom.classList.add(state);
            break;
        case 'email':
            input_email.classList.remove('valid-input', 'error-input');
            input_email.classList.add(state);
            break;
        default:
            break;
    }
}