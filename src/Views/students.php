<div class="content ">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Alunos</h2>
            <p class="text-muted">Gerencie os alunos do sistema</p>
        </div>
        <a class="btn btn-dark nav-link d-inline-flex align-items-center" href="/alunos-cadastros">
            <i class="bi bi-plus me-2"></i> Novo Aluno
        </a>
    </div>

 <div class="mb-3 d-flex align-items-center">
  <input type="text" id="searchValue" class="form-control me-2" placeholder="🔍 Buscar turmas...">
  <button type="submit" id="searchForm" class="btn btn-dark me-2">Buscar</button>
  <button type="button" id="clearSearch" class="btn btn-outline-secondary">Limpar</button>
</div>


    <div class="row g-3">
        <!-- Card 1 -->
        <!-- Tabela de alunos -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Email</th>
                        <th>Turma</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody id='resultsTable'>
                    <?php foreach($students as $student): ?>
                        <tr >
                            <td><?php echo $student['name_student'] ?></td>
                            <td><?php echo $student['cpf'] ?></td>
                            <td><?php echo $student['email'] ?></td>
                           
                            <td><span class="badge bg-dark">Turma A - Matemática</span></td>
                            <td class="text-end">
                                <a href="/alunos-editar?id=<?php echo $student['id'] ?>" class="btn btn-outline-secondary btn-sm me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" 
                                    class="btn btn-outline-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#confirmDeleteModal" 
                                     data-studentName="<?php echo $student['name_student'] ?>"
                                  
                                    data-id="<?php echo $student['id'] ?>">
                                   
                                    <i class="bi bi-trash"></i>
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
             Tem certeza que deseja excluir <strong id="studentName"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Excluir</a>
            </div>
            </div>
        </div>
    </div>

</div>




