//salvar turmas
$('#classes').on('submit', function(e){
   e.preventDefault();
   
e.preventDefault();
  const formData = new FormData(this);
  fetch('/ajax/classe_create.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    const result = document.getElementById('result');
    result.textContent = data.errors;
    result.style.display = 'block';
    result.style.backgroundColor = '#ed145b';
    result.style.color = 'white'; 
    result.style.padding = '10px';
    result.style.borderRadius = '5px';


    setTimeout(() => {
      result.style.display = 'none';
    }, 9000);
    if (data.success) {
      this.reset();
    
    }
  })
  .catch(error => console.error('Erro:', error));
});
//editar turmas
$('#classes-edit').on('submit', function(e){
   e.preventDefault();
   
e.preventDefault();
  const formData = new FormData(this);
  fetch('/ajax/classe_edit.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    const result = document.getElementById('result');
    result.textContent = data.errors;
    result.style.display = 'block';
    result.style.backgroundColor = '#ed145b';
    result.style.color = 'white'; 
    result.style.padding = '10px';
    result.style.borderRadius = '5px';


    setTimeout(() => {
      result.style.display = 'none';
    }, 9000);
    if (data.success) {
      this.reset();
    
    }
  })
  .catch(error => console.error('Erro:', error));
});
// Deletar turmas
document.addEventListener('DOMContentLoaded', function () {
  let selectedId = null;

  const deleteModal = document.getElementById('confirmDeleteClasses');
  const confirmBtn = document.getElementById('confirmDeleteBtn');
  const studentNameEl = document.getElementById('classesName');

  // Evento é executado quando o modal vai abrir
  deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget; // <a data-bs-toggle="modal"...>
    selectedId = button.getAttribute('data-id');
    const studentName = button.getAttribute('data-classesName');
    studentNameEl.textContent = studentName;
  });

  // Clicou em confirmar exclusão
  confirmBtn.addEventListener('click', function (e) {
    e.preventDefault();

    fetch('/ajax/classe_destroy.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `id=${selectedId}`
    })
      .then(response => response.json())
      .then(data => {
        const modalInstance = bootstrap.Modal.getInstance(deleteModal);
        if (data.success) {
          const row = document.querySelector(`[data-id="${selectedId}"]`).closest('.col-md-6');
          if (row) row.remove();
        }
        modalInstance.hide();
      });
  });
});


