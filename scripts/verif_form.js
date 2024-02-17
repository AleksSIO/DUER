const regexNom = /^[A-Z]+$/;
const regexPrenom = /^[A-Z][a-z]*$/;
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const regexText = /^[A-Z][a-z]*$/;

const input_nom = document.querySelector('#nom');
const input_prenom = document.querySelector('#prenom');
const input_email = document.querySelector('#email');
const select_salle = document.querySelector('#salle');
const input_lieu = document.querySelector('#lieu');
const input_situation = document.querySelector('#situation');
const select_famille = document.querySelector('#famille');

input_nom.addEventListener('input', verifNom);
input_prenom.addEventListener('input', verifPrenom);
input_email.addEventListener('input', verifEmail);
select_salle.addEventListener('change', verifSalle);
input_lieu.addEventListener('input', verifLieu);
input_situation.addEventListener('input', verifSituation);
select_famille.addEventListener('change', verifFamille);

function verifNom() {
    const nomValide = regexNom.test(input_nom.value.trim());

    if (input_nom.value.trim() === '') {
        return false;
    } else if (!nomValide) {
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
        return false;
    } else if (!prenomValide) {
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
        return false;
    } else if (!emailValide) {
        stateSwitch('email', 'error-input');
        return false;
    } else {
        stateSwitch('email', 'valid-input');
        return true;
    }
}

function verifSalle() {

    const salleValide = select_salle.value !== 'Choisir...';

    if (!salleValide) {
        stateSwitch('salle', 'error-input');
        return false;
    } else {
        stateSwitch('salle', 'valid-input');
        return true;
    }
}

function verifLieu() {

    const lieuValide = regexText.test(input_lieu.value.trim());

    if (input_lieu.value.trim() === '') {
        return false;
    } else if (!lieuValide) {
        stateSwitch('lieu', 'error-input');
        return false;
    } else {
        stateSwitch('lieu', 'valid-input');
        return true;
    }
}

function verifSituation() {

    const situationValide = regexText.test(input_situation.value.trim());

    if (input_situation.value.trim() === '') {
        return false;
    } else if (!situationValide) {
        stateSwitch('situation', 'error-input');
        return false;
    } else {
        stateSwitch('situation', 'valid-input');
        return true;
    }
}

function verifFamille() {

    const familleValide = select_famille.value !== 'Choisir...';

    if (!familleValide) {
        stateSwitch('famille', 'error-input');
        return false;
    } else {
        stateSwitch('famille', 'valid-input');
        return true;
    }
}

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
        case 'salle':
            select_salle.classList.remove('valid-input', 'error-input');
            select_salle.classList.add(state);
            break;
        case 'lieu':
            input_lieu.classList.remove('valid-input', 'error-input');
            input_lieu.classList.add(state);
            break;
        case 'situation':
            input_situation.classList.remove('valid-input', 'error-input');
            input_situation.classList.add(state);
            break;
        case 'famille':
            select_famille.classList.remove('valid-input', 'error-input');
            select_famille.classList.add(state);
            break;
        default:
            break;
    }
}