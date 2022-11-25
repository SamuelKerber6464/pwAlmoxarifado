const loginFormLogt = document.querySelector('.loginForm');

const btnModalLoginLogt = document.querySelector('.btnModalLogin');

const insideMLLogt = document.querySelector('.insideML');

const btnLogout = document.createElement('Button');
btnLogout.innerHTML = 'Logout';
btnLogout.classList.add('btnLogout');

document.querySelector('.btnLogar').disabled = 'true';

btnModalLoginLogt.innerHTML = 'Logout';

loginFormLogt.style.display = 'none';

loginFormLogt.insertAdjacentElement('beforebegin', btnLogout);

btnLogout.addEventListener('click', (e) => {
  e.preventDefault();
  window.location.href = './Source/App/manage_sessions/logout.php';
});
