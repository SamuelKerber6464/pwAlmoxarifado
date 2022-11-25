const closeModal = document.querySelector('.btnFechar');
const modalEdit = document.querySelector('.modalEdit');

const modalDelete = document.querySelector('.modalDelete');
const closeModalDelete = document.querySelector('.btnFecharDelete');

const formEdit = document.querySelector('.formEdit');
const btnSubmitEdit = document.querySelector('.btnSubmitEdit');

const formDeleted = document.querySelector('.formDeleted');

const idEdit = document.querySelector('.idEdit');
const idDelete = document.querySelector('.idDelete');

const statusDelete = document.querySelector('.statusDelete');

const btnFecharDelete = document.querySelector('.btnFecharDelete');

const btnSubmitDelete = document.querySelector('.btnSubmitDelete');

document.addEventListener('click', (e) => {
  const element = e.target;
  const defaultItems = element.parentNode.parentNode;
  if (e.target && e.target.classList.contains('btnEdit')) {
    const ids = +defaultItems.innerHTML
      .replace('<td>', '')
      .trim()
      .substr(0, defaultItems.innerHTML.indexOf('<'))
      .replace('</td>', '');

    idEdit.value = ids;

    btnSubmitEdit.addEventListener('click', (e) => {
      modalEdit.classList.remove('active');
    });

    console.log(ids);
    if (modalEdit.classList.contains('active')) {
      console.log('error');
    } else modalEdit.classList.add('active');

    closeModal.addEventListener('click', (e) => {
      e.preventDefault();
      modalEdit.classList.remove('active');
    });

    window.addEventListener('click', (e) => {
      if (e.target == modalEdit) {
        modalEdit.classList.remove('active');
      }
    });
  } else if (e.target && e.target.classList.contains('btnDelete')) {
    const ids = +defaultItems.innerHTML
      .replace('<td>', '')
      .trim()
      .substr(0, defaultItems.innerHTML.indexOf('<'))
      .replace('</td>', '');

    btnSubmitDelete.addEventListener('click', (e) => {
      modalDelete.classList.remove('active');
    });

    formDeleted.addEventListener('submit', async (e) => {
      e.preventDefault();

      defaultItems.remove();

      const formData = new FormData(formDeleted);
      formData.append('add', 1);

      const data = await fetch('../../Source/App/deleteItems.php', {
        method: 'POST',
        body: formData,
      });

      const response = await data.json();

      statusDelete.innerHTML = response['message'];
    });

    if (modalDelete.classList.contains('active')) {
      console.log('error');
    } else modalDelete.classList.add('active');

    btnFecharDelete.addEventListener('click', (e) => {
      modalDelete.classList.remove('active');
    });

    window.addEventListener('click', (e) => {
      if (e.target == modalDelete) {
        modalDelete.classList.remove('active');
      }
    });

    idDelete.value = ids;
  }
});

formEdit.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(formEdit);
  formData.append('add', 1);

  const data = await fetch('../../Source/App/editItems.php', {
    method: 'POST',
    body: formData,
  });

  const response = await data.json();

  e.preventDefault();
  modalDelete.classList.remove('active');
});
