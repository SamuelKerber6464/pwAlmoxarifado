const btnSubmitDisable = document.querySelector('.btnSubmitDisable');

const modalDisable = document.querySelector('.modalDelete');
const closeModalDisable = document.querySelector('.btnFecharDelete');

const formDisable = document.querySelector('.formDisable');

const idDisable = document.querySelector('.idDisable');

const statusDisableUser = document.querySelector('.statusDisableUser');

document.addEventListener('click', (e) => {
  const element = e.target;
  const defaultItems = element.parentNode.parentNode;
  if (e.target && e.target.classList.contains('btnDisableEmp')) {
    const ids = +defaultItems.innerHTML
      .replace('<td>', '')
      .trim()
      .substr(0, defaultItems.innerHTML.indexOf('<'))
      .replace('</td>', '');

    idDisable.value = ids;

    btnSubmitDisable.addEventListener('click', (e) => {
      modalDisable.classList.remove('active');
    });

    if (modalDisable.classList.contains('active')) {
      console.log('error');
    } else modalDisable.classList.add('active');

    closeModalDisable.addEventListener('click', (e) => {
      e.preventDefault();
      modalDisable.classList.remove('active');
    });

    window.addEventListener('click', (e) => {
      if (e.target == modalDisable) {
        modalDisable.classList.remove('active');
      }
    });
  }
});

formDisable.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(formDisable);
  formData.append('add', 1);

  const data = await fetch('../../Source/App/disableuser.php', {
    method: 'POST',
    body: formData,
  });

  const response = await data.json();

  statusDisableUser.innerHTML = response['status'];
});

const ajax = new XMLHttpRequest();

ajax.open('GET', '../../Source/App/listEmployees.php');

ajax.responseType = 'json';

ajax.send();

ajax.addEventListener('readystatechange', () => {
  if (ajax.readyState === 4 && ajax.status === 200) {
    const response = ajax.response;
    const table = document.querySelector('.tableEmployees');

    let tableContent;
    table.innerHTML = '';

    for (let key in response) {
      if (+response[key]['is_active'] == 1) {
        tableContent = `<tr class="disabled">
        <td>${response[key]['idUser']}</td>
        <td>${response[key]['username']}</td>
        <td>${response[key]['email']}</td>
        </tr>`;
      } else {
        tableContent = `<tr>
        <td>${response[key]['idUser']}</td>
        <td>${response[key]['username']}</td>
        <td>${response[key]['email']}</td>
        <td><button class="btnDisableEmp defaultBtn">Desativar</button></td>
        </tr>`;
      }

      table.insertAdjacentHTML('beforeend', tableContent);
      tableContent = '';
    }
  }
});
