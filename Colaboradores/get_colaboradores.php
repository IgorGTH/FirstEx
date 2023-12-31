<?php
require '../dbcon.php';

//Este ficheiro vai atualizar a tabela quando a filtracão dos colaboradores ativos/desativos for ativada
if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $query_run = mysqli_query($con, $query);
    
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $colaborador) {
          ?>
          <?php
            $ativo = $colaborador['Ativo'];
            $buttonClass = $ativo === 'T' ? 'bi bi-x-lg btn btn-danger bi bi-arrow-bar-left' : 'bi bi-check-lg btn btn-success';
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
}
?>