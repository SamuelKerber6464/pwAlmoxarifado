const loginForm = document.querySelector('.loginForm');

const inputEmail = document.querySelector('.inputEmail');
const inputPassword = document.querySelector('.inputPassword');

const btnModalLogin = document.querySelector('.btnModalLogin');

const loginError = document.querySelector('.loginError');

loginForm.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(loginForm);
  formData.append('add', 1);

  const data = await fetch('./Source/App/login.php', {
    method: 'POST',
    body: formData,
  });

  const response = await data.json();

  if (inputEmail.value === '') {
    loginError.innerText = 'Preencha o campo de email';
  } else if (inputPassword.value === '') {
    loginError.innerText = 'Preencha o campo senha';
  } else if (inputPassword.value.length < 8) {
    loginError.innerText = 'Necessário senha com mais de 8 caracteres';
  } else if (response['status'] === 'erro') {
    loginError.innerText = response['message'].toString();
  } else if (response['status'] === 'sucesso') {
    window.location.href = './index.php';
  } else {
    loginError.innerText = '';
  }

  console.log(response);
});
