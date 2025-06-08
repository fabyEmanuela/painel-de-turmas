<div class="content  py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Turmas</h2>
    <a href="#" class="btn btn-dark">
      <i class="bi bi-plus"></i> Nova Turma
    </a>
  </div>

  <p class="text-muted">Gerencie as turmas do sistema</p>

 

  <div class="row g-4">
    <!-- Card Turma -->
    <?php foreach($classes as $class): ?>
        <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                <h5 class="card-title fw-bold"><?php echo $class['name_classes']; ?></h5>
                <p class="text-muted small"><?php echo $class['description']; ?></p>
                </div>
                <div class="btn-group">
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash"></i>
                </button>
                </div>
            </div>

            <p class="mb-1 mt-3"><i class="bi bi-people"></i> <strong>2 aluno(s)</strong></p>
            <span class="badge bg-dark mb-2">Ativa</span>

            <div class="mb-2">
                <p class="mb-0"><strong>Alunos:</strong></p>
                <ul class="mb-2 small ps-3">
                <li>Ana Silva</li>
                <li>João Santos</li>
                </ul>
            </div>

            <a href="#" class="btn btn-outline-secondary w-100">Gerenciar Turma</a>
            </div>
        </div>
        </div>
    <?php endforeach; ?>

   
   
  </div>

  <!-- Paginação -->
  <nav aria-label="Paginação de turmas" class="mt-4">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link">Anterior</a>
      </li>
      <li class="page-item active">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">Próxima</a>
      </li>
    </ul>
  </nav>
</div>
