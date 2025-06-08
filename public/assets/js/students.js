$('#students').on('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  fetch('/ajax/student_create_edit.php', {
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
//EDITAR
$('#students-edit').on('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  fetch('/ajax/student_edit.php', {
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

//FIM EDITAR
//modal de exclusão
  let selectedId = null;

  const deleteModal = document.getElementById('confirmDeleteModal');
  const confirmBtn = document.getElementById('confirmDeleteBtn');
  const studentNameEl = document.getElementById('studentName');

  deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    selectedId = button.getAttribute('data-id');
    const studentName = button.getAttribute('data-studentName');
    studentNameEl.textContent = studentName;
  });

  confirmBtn.addEventListener('click', function () {
    fetch('/ajax/student_destroy.php', {
      
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `id=${selectedId}`
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
     
        const row = document.querySelector(`[data-id="${selectedId}"]`).closest('tr');
        row.remove();
        const modal = bootstrap.Modal.getInstance(deleteModal);
        modal.hide();
      } else {
        alert(data.errors ? `Erro ao excluir aluno: ${data.errors}` : 'Erro ao excluir aluno.');
      }
    });
  });
//fim modal de exclusão
//busca de alunos
  document.getElementById('searchForm').addEventListener('click', function(e) {  
  e.preventDefault();

  const searchQuery = document.getElementById('searchValue').value; 
  
  fetch('/ajax/student_search.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `search=${searchQuery}`
  })  
  .then(response => response.json())
  .then(data => {
    const resultsTable = document.getElementById('resultsTable');
    resultsTable.innerHTML = '';

console
    if ( data.success == true ) {
      data.data.forEach(student => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${student.name_student}</td>
          <td>${student.cpf}</td>
          <td>${student.email}</td>
          <td>${student.phone}</td>
          <td>
            <a href="#" class="btn btn-outline-secondary btn-sm me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" 
                                    class="btn btn-outline-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#confirmDeleteModal" 
                                     data-studentName="${student.name_student}"
                                  
                                    data-id="${student.id}">
                                   
                                    <i class="bi bi-trash"></i>
                                </a>
          </td>`;
        resultsTable.appendChild(row);
      });
    } else {
      resultsTable.innerHTML = '<tr><td colspan="5">Nenhum aluno encontrado para sua busca</td></tr>';
    }
  })
  .catch(error => console.log('Erro:', error));
  });
//fim busca de alunos
//limpar  busca
$('#clearSearch').on('click', function(e) {
  e.preventDefault();
 window.location.reload()
});
