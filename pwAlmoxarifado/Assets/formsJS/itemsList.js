const ajax = new XMLHttpRequest();

const url = '../../Source/App/itemsList.php';

const selectFilter = document.querySelector('.selectFilter');

const inputType = document.querySelector('.inputType');
const inputUser = document.querySelector('.inputUser');

const formSelect = document.querySelector('.formSelect');

const btnFilter = document.querySelector('.btnFilter');

let tipo = false;
let user = false;

if (selectFilter.value === 'nenhum' || selectFilter.value === 'Filtro') {
  inputUser.style.display = 'none';
  inputType.style.display = 'none';
  user = false;
  tipo = false;
}

selectFilter.addEventListener('change', async (e) => {
  const valueFilter = e.target.value;

  if (valueFilter === 'tipo') {
    inputUser.style.display = 'none';
    inputUser.value = '';
    user = false;
    inputType.style.display = 'flex';
    tipo = true;
  } else if (valueFilter === 'usuario') {
    inputUser.style.display = 'flex';
    user = true;
    inputType.style.display = 'none';
    inputType.value = '';
    tipo = false;
  } else {
    inputUser.style.display = 'none';
    inputUser.value = '';
    user = false;
    inputType.style.display = 'none';
    inputType.value = '';
    tipo = false;
  }
});

ajax.open('GET', url);

ajax.responseType = 'json';

ajax.send();

let arrElements = [];

ajax.addEventListener('readystatechange', () => {
  if (ajax.readyState === 4 && ajax.status === 200) {
    const response = ajax.response;
    const table = document.querySelector('.table');

    arrElements = Array.from(response);

    btnFilter.addEventListener('click', (e) => {
      e.preventDefault();

      let tableContent;
      table.innerHTML = '';

      for (let key in response) {
        if (+response[key]['is_deleted'] === 1) {
          console.log(response[key]);
        } else {
          if (user === true) {
            if (response[key]['itemUser'] === inputUser.value) {
              tableContent = `<tr>
            <td>${response[key]['idItem']}</td>
            <td>${response[key]['itemName']}</td>
            <td>${response[key]['itemType']}</td>
            
            <td>${response[key]['itemQuantity']}</td>
            <td>${response[key]['itemLocation']}</td>
            <td>${response[key]['itemShelf']}</td>
            <td>${response[key]['itemUser']}</td>
            <td><button class="btnEdit btnList">edit</button></td>
            <td><button class="btnDelete btnList">X</button></td>
            
          </tr>`;
            } else {
              tableContent = '';
            }
          } else if (tipo === true) {
            if (response[key]['itemType'] === inputType.value) {
              tableContent = `<tr>
            <td>${response[key]['idItem']}</td>
            <td>${response[key]['itemName']}</td>
            <td>${response[key]['itemType']}</td>
            <td>${response[key]['itemQuantity']}</td>
            <td>${response[key]['itemLocation']}</td>
            <td>${response[key]['itemShelf']}</td>
            <td>${response[key]['itemUser']}</td>
            <td><button class="btnEdit btnList">edit</button></td>
            <td><button class="btnDelete btnList">X</button></td>


          </tr>`;
            } else {
              tableContent = '';
            }
          } else {
            tableContent = `<tr>
            <td>${response[key]['idItem']}</td>
            <td>${response[key]['itemName']}</td>
            <td>${response[key]['itemType']}</td>
            <td>${response[key]['itemQuantity']}</td>
            <td>${response[key]['itemLocation']}</td>
            <td>${response[key]['itemShelf']}</td>
            <td>${response[key]['itemUser']}</td>
            <td><button class="btnEdit btnList">edit</button></td>
            <td><button class="btnDelete btnList">X</button></td>

          </tr>`;
          }
          table.insertAdjacentHTML('beforeend', tableContent);
          tableContent = '';
        }
      }
    });
  }
});
