<?php
session_start();
require '../dbcon.php'; 

if(isset($_POST['desativar_colaborador']))
 {
    $colb_id = mysqli_real_escape_string($con, $_POST['colb_id']);
    
    $query = "SELECT * FROM colaboradores WHERE id = '$colb_id'";
    $query_run = mysqli_query($con, $query); 
    foreach ($query_run as $colaborador) {
        $ativo = $colaborador['Ativo'];
        $NovoAtivo = $ativo === 'T' ? 'F' : 'T';
      }




    $query = "UPDATE Colaboradores SET Ativo = '$NovoAtivo' WHERE Id = '$colb_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        
        $res['status'] = 200;
        $res['message'] = "Colaborador Desativado/Ativado com sucesso";


        echo json_encode($res);
        return;
    }
    else
    {
        $res['status'] = 200;
        $res['message'] = "Erro ao  Desativar/Ativar com sucesso";

        echo json_encode($res);
        return;
    }
 }

?>