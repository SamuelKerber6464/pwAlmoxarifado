const formRegisterItems = document.querySelector('.formRegisterItems');

const statusRegisterItem = document.querySelector('.statusRegisterItem');

const inputName = document.querySelector('.name');
const inputquantity = document.querySelector('.quantity');
const inputType = document.querySelector('.type');
const inputLocation = document.querySelector('.location');

const items = document.querySelectorAll('.item');

formRegisterItems.addEventListener('submit', async (e) => {
  e.preventDefault();

  items.forEach((e) => {
    if (e.value.length === 0) {
      statusRegisterItem.innerHTML = 'Por favor, preencha todos os campos';
    }
  });

  if (!Number.isInteger(+inputquantity.value)) {
    statusRegisterItem.innerHTML =
      'A quantia precisa obrigatóriamente ser um número';
  }

  const formData = new FormData(formRegisterItems);
  formData.append('add', 1);

  const data = await fetch('../../Source/App/registerItem.php', {
    method: 'POST',

    body: formData,
  });

  const response = await data.json();

  if (response['status'].toString() === 'sucesso') {
    statusRegisterItem.innerHTML = response['status'];
  }
});
