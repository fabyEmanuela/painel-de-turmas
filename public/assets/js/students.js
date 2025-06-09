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

    
    }
  })
  .catch(error => console.error('Erro:', error));
});
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
          <td>
           <a href="/alunos-editar?id=${student.id}" class="btn btn-outline-secondary btn-sm me-1"><i class="bi bi-pencil-square"></i></a>
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
