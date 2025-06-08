


  <!-- Conteúdo Principal -->
  <div class="content">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2>Dashboard</h2>
        <p class="text-muted">Bem-vindo ao sistema de gestão escolar</p>
      </div>
      <div>
        <span>Olá, Administrador</span>
        <a href="#" class="btn btn-outline-dark btn-sm ms-3">Sair</a>
      </div>
    </div>

    <!-- Cards Estatísticas -->
    <div class="row g-4 mb-4">
      <div class="col-md-3">
        <div class="card shadow-sm p-3">
          <div class="d-flex justify-content-between">
            <div>
              <h6>Total de Alunos</h6>
              <h3><?php echo $sumStudent; ?></h3>
              <small>Alunos cadastrados</small>
            </div>
            <div class="text-primary card-icon">👨‍🎓</div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm p-3">
          <div class="d-flex justify-content-between">
            <div>
              <h6>Total de Turmas</h6>
              <h3><?php echo $sumClasses; ?></h3>
              <small>Turmas criadas</small>
            </div>
            <div class="text-success card-icon">👥</div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm p-3">
          <div class="d-flex justify-content-between">
            <div>
              <h6>Alunos em Turmas</h6>
              <h3>0</h3>
              <small>Alunos matriculados</small>
            </div>
            <div class="text-purple card-icon">📘</div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm p-3">
          <div class="d-flex justify-content-between">
            <div>
              <h6>Alunos sem Turma</h6>
              <h3>3</h3>
              <small>Aguardando matrícula</small>
            </div>
            <div class="text-warning card-icon">📙</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Ações Rápidas -->
    <h5 class="mb-3">Ações Rápidas</h5>
    <div class="row g-4 mb-5">
      <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
          <div class="text-primary fs-2 mb-2">➕</div>
          <h6>Cadastrar Aluno</h6>
          <p class="small text-muted">Adicionar novo aluno</p>
          <a href="/alunos-cadastros" class="btn btn-dark btn-sm">Acessar</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
          <div class="text-success fs-2 mb-2">➕</div>
          <h6>Criar Turma</h6>
          <p class="small text-muted">Nova turma no sistema</p>
          <a href="#" class="btn btn-dark btn-sm">Acessar</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
          <div class="text-purple fs-2 mb-2">👨‍🎓</div>
          <h6>Ver Alunos</h6>
          <p class="small text-muted">Todos os alunos</p>
          <a href="/alunos" class="btn btn-dark btn-sm">Acessar</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center shadow-sm p-3">
          <div class="text-warning fs-2 mb-2">👥</div>
          <h6>Ver Turmas</h6>
          <p class="small text-muted">Todas as turmas</p>
          <a href="/turmas" class="btn btn-dark btn-sm">Acessar</a>
        </div>
      </div>
    </div>

    
  </div>



     

