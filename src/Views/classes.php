<div class="content  py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Turmas</h2>
    <a href="/cadastro-turmas" class="btn btn-dark">
      <i class="bi bi-plus"></i> Nova Turma
    </a>
  </div>

  <p class="text-muted">Gerencie as turmas do sistema</p>

 

  <div class="row">
  <?php foreach($classes as $class): ?>
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h5 class="card-title fw-bold"><?php echo $class['name_classes']; ?></h5>
              <p class="text-muted small"><?php echo $class['description']; ?></p>
            </div>
            <div class="btn-group"  >

             <a href="#" 
                                    class="btn btn-outline-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#confirmDeleteClasses" 
                                     data-classesName="<?php echo $class['name_classes'] ?>"
                              


 
 
                                    data-id="<?php echo $class['id'] ?>">
                                   
                                    <i class="bi bi-trash"></i>
                                </a>
            </div>
          </div>
          <p class="mb-1 mt-3"><i class="bi bi-people"></i> <strong><?php echo $class['total_alunos']; ?> aluno(s)</strong></p>
          <a href="/editar-turma?id=<?php echo $class['id'] ?>" class="btn btn-outline-secondary w-100">Gerenciar Turma e editar</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="modal fade" id="confirmDeleteClasses" tabindex="-1" aria-labelledby="confirmDeleteClassesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteClassesLabel">Confirmar exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
             Tem certeza que deseja excluir <strong id="classesName"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Excluir</a>
            </div>
            </div>
        </div>
    </div>
</div>


  <!-- Paginação -->
 
</div>
