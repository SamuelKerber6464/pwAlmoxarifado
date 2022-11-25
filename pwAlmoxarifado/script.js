import { createModal } from './Assets/frontJS/createModal.js';

const btnModalLogin = document.querySelector('.btnModalLogin');
const modalLogin = document.querySelector('.modalLogin');
const btnFechar = document.querySelector('.btnFechar');

createModal(btnModalLogin, modalLogin, btnFechar);
