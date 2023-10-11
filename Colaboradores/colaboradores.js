
$(document).on('submit', '#AddColaborador', function (e) {  //Funcao que insere os dados na base de dados e que faz a tabela atualizar
    e.preventDefault();

      var formData = new FormData(document.getElementById('salvarColaboradorForm'));
      formData.append("salvar_colaborador", true);

           $.ajax({
            type: "POST",
            url: "Colaboradores/Insert.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              console.log('AJAX request successful');
              var res = jQuery.parseJSON(response);

              if (res.status == 422) {
                  $('#errorMessage').removeClass('d-none');
                  $('#errorMessage').text(res.message); 

              } else if (res.status == 200) {

                  $('#errorMessage').addClass('d-none');
                  $('#AddColaborador').modal('hide');
                  $('#salvarColaboradorForm')[0].reset();

                  alert(res.message);

                  $('#ColbTable').load(location.href + " #ColbTable");
              }
            }
        });
      
});

//Execução do botão view para abrir o modal com as informacoes do colaborador selecionado
$(document).on('click', '.viewColaboradorBtn', function () {

  var colb_id = $(this).val();
  $.ajax({
      type: "GET",
      url: "GetId.php?colb_id=" + colb_id,
      success: function (response) {

          var res = jQuery.parseJSON(response);
          if(res.status == 404) {

              alert(res.message);
          }else if(res.status == 200){

                  $('input[name="colb_id"]').val(res.data.ID);
                  $('input[name="nome"]').val(res.data.Nome);
                  $('input[name="email"]').val(res.data.Email);
                  $('textarea[name="morada"]').val(res.data.Morada);

                  $('#ViewColaborador').modal('show');
          }
      }                                                             
  });
});

$(document).on('click', '.editColaboradorBtn', function () {

  var colb_id = $(this).val();
  $.ajax({
      type: "GET",
      url: "GetId.php?colb_id=" + colb_id,
      success: function (response) {

          var res = jQuery.parseJSON(response);
          if(res.status == 404) {

              alert(res.message);
          }else if(res.status == 200){


                  $('input[name="colb_id"]').val(res.data.Id);
                  $('input[name="nome"]').val(res.data.Nome);
                  $('input[name="email"]').val(res.data.Email);
                  $('textarea[name="morada"]').val(res.data.Morada);

                  
                  $('#EditColaborador').modal('show');
          }
      }                                                             
  });
});

$(document).on('submit', '#EditColaborador', function (e) {  //Funcao que altera os dados na base de dados e que faz a tabela atualizar
  e.preventDefault();

    var formData = new FormData(document.getElementById('editarColaboradorForm'));
    formData.append("editar_colaborador", true);

         $.ajax({
          type: "POST",
          url: "Colaboradores/Edit.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            console.log('AJAX request successful');
            var res = jQuery.parseJSON(response);

            if (res.status == 422) {
                $('#errorMessageUpdate').removeClass('d-none');
                $('#errorMessageUpdate').text(res.message); 

            } else if (res.status == 200) {

                $('#errorMessageUpdate').addClass('d-none');
                $('#EditColaborador').modal('hide');
                $('#editarColaboradorForm')[0].reset();

                alert(res.message);

                $('#ColbTable').load(location.href + " #ColbTable");
            }
          }
      });
    
});

//Função que filtra a tabela de acordo com a checkbox
$(document).ready(function() {

  $('#ativosCheckbox').change(function() {

    const isChecked = $(this).is(':checked');


    const query = isChecked
      ? "SELECT * FROM colaboradores WHERE Ativo = 'T'"
      : "SELECT * FROM colaboradores WHERE Ativo = 'F'";

    $.ajax({
      url: 'Colaboradores/get_colaboradores.php',
      method: 'POST',
      data: { query: query },
      success: function(data) {
      console.log('AJAX request successful');

      $('#ColbTable tbody').empty();
        
        // Append the new data
      $('#ColbTable tbody').html(data);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
});