 
<div class="content">
      <!-- Main content -->
    
      <div class="col-md-10 p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          
            <h2>Alunos</h2>
            <p class="text-muted">  Editar Aluna(o) <?php  echo $student['name_student']; ?></p>
        </div>
        <a class="btn btn-dark nav-link d-inline-flex align-items-center" href="/alunos">
            <i class="bi bi-plus me-2"></i> Ver alunos 
        </a>
    </div>
       

        <div class="form-card mt-4">
          <h4 class="fw-bold mb-4">Novo Aluno</h4>
          <div id='result'>
        
          </div>
          <form id="students-edit"  >
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Nome Completo *</label>
                <input type="hidden" name="id" value="<?php echo  $student['id'] ?? '' ?>">
                 <input type="hidden" name="formType" value="edit">
                <input name="name_student" type="text" class="form-control" required placeholder="Digite o nome completo"   value="<?php echo  $student['name_student'] ?? '' ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Data de Nascimento *</label>
                <input  name="date_birth"type="date" required class="form-control"  value="<?php echo  $student['date_birth'] ?? '' ?>">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">CPF *</label>
                <input  name="cpf" type="text" id="cpf" class="form-control" required  maxlength="14"   value="<?php echo  $student['cpf'] ?? '' ?>"  placeholder="000.000.000-00" >
              </div>
              <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input name="email" type="email"  value="<?php echo  $student['email'] ?? '' ?>" class="form-control"required placeholder="aluno@email.com">
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-md-6">
                <label class="form-label">Nova senha  *</label>
                <input name="password" type="password" class="form-control"  placeholder="Digite a senha">
              </div>
            </div>
            <div class="d-flex justify-content-end gap-2">
              <button type="submit" class="btn btn-dark">atualizar</button>
            </div>
          </form>
        </div>

      </div>
</div>




