export function createModal(btnActive, modalContainer, closeModal) {
  modalContainer.classList.remove('active');

  btnActive.addEventListener('click', (e) => {
    e.preventDefault();

    if (modalContainer.classList.contains('active')) {
      console.log('error');
    } else modalContainer.classList.add('active');
  });

  closeModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalContainer.classList.remove('active');
  });

  window.addEventListener('click', (e) => {
    if (e.target == modalContainer) {
      modalContainer.classList.remove('active');
    }
  });
}
