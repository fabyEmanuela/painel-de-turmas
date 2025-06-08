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
    const modal = bootstrap.Modal.getInstance(deleteModal);
    if (data.success ) {
      const row = document.querySelector(`[data-id="${selectedId}"]`).closest('tr');
      row.remove();
      modal.hide();
    } else {
   
      modal.hide();
    }
  });
});