 
  <?php   
   require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/layouts/menu-bar.php';?>
      <!-- Main content -->
      <div class="col-md-10 p-5">
        <h2 class="fw-bold">Cadastrar Aluno</h2>
        <p class="text-primary">Adicione um novo aluno ao sistema</p>

        <div class="form-card mt-4">
          <h4 class="fw-bold mb-4">Novo Aluno</h4>
          <form>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Nome Completo *</label>
                <input type="text" class="form-control" placeholder="Digite o nome completo">
              </div>
              <div class="col-md-6">
                <label class="form-label">Data de Nascimento *</label>
                <input type="date" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">CPF *</label>
                <input type="text" class="form-control" placeholder="000.000.000-00">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" placeholder="aluno@email.com">
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-md-6">
                <label class="form-label">Senha *</label>
                <input type="password" class="form-control" placeholder="Digite a senha">
              </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
              <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
              <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
     <?php   require_once __DIR__ . '/../Views/layouts/footer.php';?>