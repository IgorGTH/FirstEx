<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio Diagnostico</title> <!-- Titulo na aba-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <body>

    <div class="modal fade" id="AddColaborador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id= "salvarColaboradorForm">                    
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Colaborador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errorMessage" class="alert alert-danger d-none"></div>

                    <input type="hidden" name="colb_id" id="id"> <!-- Id de cada colaborador -->

                    <div class="mb-3"><!-- Campo Nome -->
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    
                    <div class="mb-3"><!-- Campo Email-->a
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control"1 placeholder="nome@example.com" name="email" >
                    </div>

                    <div class="mb-3"><!-- Campo Morada -->
                        <label class="form-label">Morada</label>
                        <textarea class="form-control" name="morada" rows="3"></textarea>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="flexCheckChecked">Ativo</label> 
                        <input class="form-check-input" type="checkbox" value="" name="ativo" checked>   
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <!-- End Add Colaborador Modal-->
    

    <div class="modal fade" id="ViewColaborador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id= "verColaboradorForm">                    
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informações</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errorMessage" class="alert alert-danger d-none"></div>

                    <input type="hidden" name="colb_id" id="id"> <!-- Id de cada colaborador -->

                    <div class="mb-3"><!-- Campo Nome -->
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" readonly>
                    </div>
                    
                    <div class="mb-3"><!-- Campo Email-->
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control"1 placeholder="nome@example.com" name="email" readonly>
                    </div>

                    <div class="mb-3"><!-- Campo Morada -->
                        <label class="form-label">Morada</label>
                        <textarea class="form-control" name="morada" rows="3" readonly></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <!-- End View Colaborador Modal-->

    <div class="modal fade" id="EditColaborador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id= "editarColaboradorForm">                    
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Colaborador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errorMessageUpdate" class="alert alert-danger d-none"></div>

                    <input type="hidden" name="colb_id" id="id"> <!-- Id de cada colaborador -->

                    <div class="mb-3"><!-- Campo Nome -->
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    
                    <div class="mb-3"><!-- Campo Email-->
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control"1 placeholder="nome@example.com" name="email" >
                    </div>

                    <div class="mb-3"><!-- Campo Morada -->
                        <label class="form-label">Morada</label>
                        <textarea class="form-control" name="morada" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <!-- End Edit Colaborador Modal-->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Colaboradores               
                    <div class="form-check float-end ">
                        <label for="ativosCheckbox" class="form-check-label">Ativos</label>
                        <input type="checkbox" id="ativosCheckbox" name="ativosCheckbox" class="form-check-input mx-2" checked>
                        <a type="button" id="exampleModalLabel" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#AddColaborador">Adicionar Colaborador</a>
                    </div>
                </h5>
            </div>           
            <div class="card-body">
                <table  id="ColbTable" class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php
                            require 'dbcon.php';                         

                            
                            $query = "SELECT * FROM colaboradores WHERE Ativo = 'T'";
                            $query_run = mysqli_query($con, $query); 

                              if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $colaborador) {
                                  ?>
                                  <?php
                                    $ativo = $colaborador['Ativo'];
                                    $buttonClass = $ativo === 'T' ? 'bi bi-arrow-bar-left btn btn-danger bi bi-arrow-bar-left' : 'bi bi-arrow-bar-right btn btn-success';
                                    ?>
                                  <tr>
                                    <td><?= $colaborador['Nome'] ?></td>
                                    <td><?= $colaborador['Email'] ?></td>
                                    <td>                                                                           
                                      <button type="button" value="<?=$colaborador['Id'];?>" class="viewColaboradorBtn bi bi-info-circle btn btn-info btn-sm"></button>
                                      <button type="button" value="<?=$colaborador['Id'];?>" class="editColaboradorBtn bi bi-pencil-square btn btn-warning btn-sm"></button>                                            
                                      <button type="button" value="<?=$colaborador['Id'];?>" class="DeleteColaboradorBtn <?php echo $buttonClass;?> btn-sm"></button>                                
                                    </td>
                                  </tr>
                                  <?php
                                }
                              }
                              
                            
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
    <!-- Fim tabela -->




   

    
  </body>
</html>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="Colaboradores/colaboradores.js"></script>
