 
<div class="content">
      <!-- Main content -->
    
      <div class="col-md-10 p-5">
        <h2 class="fw-bold">Cadastrar Aluno</h2>
        <p class="text-primary">Adicione um novo aluno ao sistema</p>

        <div class="form-card mt-4">
          <h4 class="fw-bold mb-4">Novo Aluno</h4>
          <div id='result'>
         
        
          </div>
          <form id="students"  >
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Nome Completo *</label>
                <input name="name_student" type="text" class="form-control" required placeholder="Digite o nome completo">
              </div>
              <div class="col-md-6">
                <label class="form-label">Data de Nascimento *</label>
                <input  name="date_birth"type="date" required class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">CPF *</label>
                <input  name="cpf" type="text" id="cpf" class="form-control" required   maxlength="14" placeholder="000.000.000-00">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input name="email" type="email" class="form-control"required placeholder="aluno@email.com">
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-md-6">
                <label class="form-label">Senha *</label>
                <input name="password" type="password" class="form-control" required placeholder="Digite a senha">
              </div>
            </div>
         

       

            <div class="d-flex justify-content-end gap-2">
             
              <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
          </form>
        </div>

      </div>
</div>




