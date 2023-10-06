<?php
session_start();
require 'dbcon.php';   

//Pegar o Id do funcionario que queremos editar ou ver as informações
if(isset($_GET['colb_id']))
 {
     $colaborador_id = mysqli_real_escape_string($con, $_GET['colb_id']);
 
     $query = "SELECT * FROM colaboradores WHERE id='$colaborador_id'";
     $query_run = mysqli_query($con, $query);
 
     if(mysqli_num_rows($query_run) == 1)
     {
         $colb = mysqli_fetch_array($query_run);
 
         $res = [
             'status' => 200,
             'message' => 'Colaborador Encontrado',
             'data' => $colb
         ];
         echo json_encode($res);
         return;
     }
     else
     {
         $res = [
             'status' => 404,
             'message' => 'Colaborador nao encontrado'
         ];
         echo json_encode($res);
         return;
     }
 }

 ?>