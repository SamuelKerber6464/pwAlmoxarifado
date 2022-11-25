const ajax = new XMLHttpRequest();

ajax.open('GET', '../../Source/App/deletedItems.php');

ajax.responseType = 'json';

ajax.send();

ajax.addEventListener('readystatechange', () => {
  if (ajax.readyState === 4 && ajax.status === 200) {
    const response = ajax.response;
    const table = document.querySelector('.tableDeletedItems');

    let tableContent;
    table.innerHTML = '';

    for (let key in response) {
      tableContent = `<tr class="trDeleted">
      <td>${response[key]['idItem']}</td>
      <td>${response[key]['itemName']}</td>
      <td>${response[key]['itemQuantity']}</td>
      <td>${response[key]['itemType']}</td>
      <td>${response[key]['itemLocation']}</td>
      <td>${response[key]['itemShelf']}</td>
      <td>${response[key]['deleted_by']}</td>
      <td>${response[key]['deleted_at']}</td>
      </tr>`;
      table.insertAdjacentHTML('beforeend', tableContent);
      tableContent = '';
    }
  }
});
