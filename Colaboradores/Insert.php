<?php
session_start();
require '../dbcon.php'; 

if(isset($_POST['salvar_colaborador']))//Funcao que Executa o comando SQLdadadada
{
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $morada = mysqli_real_escape_string($con, $_POST['morada']);
    if (isset($_POST['ativo'])) { //Verifica se a checkbox esta selecionada ou não para verificar se o novo colaborador vai estar ativo ou não 
        $ativo = mysqli_real_escape_string($con,'T');
    }else{
        $ativo = mysqli_real_escape_string($con,'F');
    }
    


    
    if($nome == NULL || $email == NULL || $morada == NULL){
        $res = [
            'status' => 422,
            'message' => 'Todos os campos são obrigatórios'
        ];
        echo json_encode($res);
        return;

        }


    $query = "INSERT INTO colaboradores (nome, email, morada, ativo) VALUES
        ('$nome', '$email', '$morada','$ativo')";

    
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $res['status'] = 200;
        $res['message'] = "Colaborador criado com sucesso";

        
        echo json_encode($res);
        return;
    }
    else
    {
        $res['status'] = 500;
        $res['message'] = "Erro ao criar o novo Colaborador";

        
        echo json_encode($res);
        return;
    }
}

?>


