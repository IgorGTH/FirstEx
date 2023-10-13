<?php
session_start();
require '../dbcon.php'; 


if(isset($_POST['editar_colaborador']))//Funcao que Executa o comando SQL caso o utilizador clique no botão salvar
{
    $colb_id = mysqli_real_escape_string($con, $_POST['colb_id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $morada = mysqli_real_escape_string($con, $_POST['morada']);    


    
    if($nome == NULL || $email == NULL || $morada == NULL){
        $res = [
            'status' => 422,
            'message' => 'Todos os campos são obrigatórios'
        ];
        echo json_encode($res);
        return;

        }


    $query = "UPDATE colaboradores SET nome = '$nome', email = '$email', morada = '$morada' WHERE Id = '$colb_id'";
        

    
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $res['status'] = 200;
        $res['message'] = "Colaborador alterado com sucesso";

        
        echo json_encode($res);
        return;
    }
    else
    {
        $res['status'] = 500;
        $res['message'] = "Erro ao alterar o novo Colaborador";

        
        echo json_encode($res);
        return;
    }
}

?>


