<div class="content  py-4">
    <h2 class="fw-bold">Criar Turma</h2>
  <p class="text-muted mb-4">Adicione uma nova turma ao sistema</p>

  <form id="classes">
    <!-- Dados da Turma -->
  
    <div class="card mb-4 shadow-sm">
         <div id='result'>
         
      </div>
      <div class="card-body">
        <h5 class="fw-bold mb-3">Dados da Turma</h5>

        <div class="mb-3">
          <label for="nomeTurma" class="form-label fw-semibold">Nome da Turma *</label>
          <input type="text" name ="name_classes" class="form-control" required   id="nomeTurma" placeholder="Ex: Turma A - Matemática">
        </div>

        <div class="mb-0">
          <label for="descricao" class="form-label fw-semibold">Descrição</label>
          <textarea class="form-control"  name ="description"  required  id="descricao" rows="3" placeholder="Descreva o objetivo e características da turma"></textarea>
        </div>
      </div>
    </div>

   

    <!-- Botões -->
    <div class="d-flex justify-content-end gap-2">
      <button type="reset" class="btn btn-outline-dark">Cancelar</button>
      <button type="submit" class="btn btn-dark">Criar Turma</button>
    </div>
  </form>
</div>