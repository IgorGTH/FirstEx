<?php
//Ficheiro que faz a conexao com a base de dados
$con = mysqli_connect("localhost","root","","First");

if(!$con){
    die('Conection Failed'.msqli_connect_error());
}

?>