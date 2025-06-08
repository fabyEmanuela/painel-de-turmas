  
  
  $('#students').on('submit', function(e) {
  e.preventDefault();
  
  const formData = new FormData(this);

  fetch('/ajax/student_create_edit.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    document.getElementById('result').textContent = data.errors;
    document.getElementById('result').style.display = 'block';
    setTimeout(() => {
      document.getElementById('result').style.display = 'none';
    }, 8000);
    if (data.success) {
      this.reset();
    
    }
  })
  .catch(error => console.error('Erro:', error));
});


  // let selectedId = null;

  // const deleteModal = document.getElementById('confirmDeleteModal');
  // const confirmBtn = document.getElementById('confirmDeleteBtn');
  // const studentNameEl = document.getElementById('studentName');

  // deleteModal.addEventListener('show.bs.modal', function (event) {
  //   const button = event.relatedTarget;
  //   selectedId = button.getAttribute('data-id');
  //   const studentName = button.getAttribute('data-studentName');
  //   studentNameEl.textContent = studentName;
  // });

  // confirmBtn.addEventListener('click', function () {
  //   fetch('/ajax/student_destroy.php', {
      
  //     method: 'POST',

  //     body: `id=${selectedId}`
  //   })
  //   .then(response => response.json())
  //   .then(data => {
  //     if (data.success) {
     
  //       const row = document.querySelector(`[data-id="${selectedId}"]`).closest('tr');
  //       row.remove();
  //       const modal = bootstrap.Modal.getInstance(deleteModal);
  //       modal.hide();
  //     } else {
  //       alert('Erro ao excluir aluno.');
  //     }
  //   });
  // });



