const formRegisterUser = document.querySelector('.formRegisterUser');
const statusRegister = document.querySelector('.statusRegister');

const inputUsername = document.querySelector('.username');
const inputEmail = document.querySelector('.email');
const inputPassword = document.querySelector('.password');

formRegisterUser.addEventListener('submit', async (e) => {
  e.preventDefault();

  if (inputUsername.value.length === 0) {
    statusRegister.innerHTML = 'Necessário preencher o username';
  } else if (inputEmail.value.length === 0) {
    statusRegister.innerHTML = 'Necessário preencher o email';
  } else if (inputUsername.value.length === 0) {
    statusRegister.innerHTML = 'Necessário preencher a senha';
  } else if (inputPassword.value.length < 8) {
    statusRegister.innerHTML = 'Necessário mais de 8 digitos na senha';
  }

  const formData = new FormData(formRegisterUser);
  formData.append('add', 1);

  const data = await fetch('../../Source/App/registerUser.php', {
    method: 'POST',
    body: formData,
  });

  const response = await data.json();

  statusRegister.innerHTML = response['message'].toString();
});
