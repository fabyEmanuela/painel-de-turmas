<div class="container py-5">
  <!-- Título -->
  <div class="mb-4">
    <h2 class="fw-bold">Editar Turma :<?php  echo $class['name_classes']; ?></h2>
    <p class="text-muted">Atualize as informações da turma</p>
  </div>
    <div id='result'>
        
    </div>
<form id="classes-edit">
   
  <!-- Dados da Turma -->
  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title fw-bold mb-3">Dados da Turma</h5>

      <div class="mb-3">
        <label class="form-label">Nome da Turma *</label>
        <input type="text"  name="name_classes" class="form-control" value="<?php echo  $class['name_classes'] ?? '' ?>">
          <input type="hidden" name="id" value="<?php echo  $class['id'] ?? '' ?>">
      </div>

      <div class="mb-0">
        <label class="form-label">Descrição</label>
       <textarea class="form-control" rows="3" name="description"><?= trim(htmlspecialchars($class['description'] ?? '', ENT_QUOTES, 'UTF-8')) ?></textarea>

      </div>
    </div>
  </div>

  <!-- Alunos da Turma -->
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="card-title fw-bold mb-0">
          <i class="bi bi-people-fill me-2"></i> Alunos da Turma
        </h5>
       
      </div>
      <p class="small text-muted mb-3">Selecione os alunos que farão parte desta turma:</p>

      <div class="row g-3">
        <!-- Aluno 1 -->
         <?php foreach($students as $student): ?>
            <div class="col-md-4">
                <div class="form-check border rounded p-4 bg-light ">
            
                <input class="form-check-input"  name=student[] type="checkbox"  value="<?= $student['id'] ?>" id="student" >
                <label class="form-check-label" for="aluno1">
                <strong><?php echo  $student['name_student']; ?></strong><br>
                <small class="text-muted">Email: <?php echo  $student['email']; ?></small>
                </label>
                </div>
            </div>
        <?php endforeach; ?>
    
     
      </div>
    <br>
       <h5 class="card-title fw-bold mb-0">
          <i class="bi bi-people-fill me-2"></i> Alunos que ja fazem parte da turma:
        </h5>
      <div class="row g-3">
        <?php foreach($students_classes as $index => $class): ?>
            <div class="col-md-6 col-lg-4 mb-4 <?php echo $index >= 3 ? 'mt-md-4' : ''; ?>">
                <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <label class="form-check-label" for="aluno1">
                        <strong><?php echo  $class['name_student']; ?></strong><br>
                        <small class="text-muted">Email: <?php echo  $class['email']; ?></small>
                    </label>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Botões -->
  <div class="d-flex justify-content-end gap-2">
    <button class="btn btn-outline-secondary">Cancelar</button>
    <button class="btn btn-dark">Atualizar Turma</button>
  </div>
  </form>
</div>
