$(document).ready(function(){

      $("#alt-alunos").click(function() {
            var id = $(this).data('data');

            $.ajax({
            type: "GET",
            url: "altera-alunos.php",
            data: {id_aluno: id},
              success: function(data){
                $("#ajax").html(data);
                alert(id);
              }
            });


    });

});
