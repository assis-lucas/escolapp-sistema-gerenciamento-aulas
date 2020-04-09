$("#qt_aulas").change(function (e) {

 var iNomeAluno = $("#nomeAluno").val();
 var iNomeInstrutor = $("#nomeInstrutor").val();
 var iData = $("#data-input").val();
 var iHorario = $("#horario").val();
 var iQtAulas = $("#qt_aulas").val();

      if( iData == '' || iNomeAluno == '' || iNomeInstrutor == '' || iHorario == '' || iQtAulas == '' ){
        $.ajax({
          type: "POST",
          url: "checagens.php",
          data: {erro: 4, valida: 2},
            success: function(data){
            $("#return_ajax").html(data);
            }
        });
      } else {
            $.ajax({
              type: "POST",
              url: "checagens.php",
              data:
              {aluno: iNomeAluno, instrutor: iNomeInstrutor, data: iData,
                horario: iHorario, qt_aulas:iQtAulas, valida: 1},
                success: function(data){
                $("#return_ajax").html(data);
                }
            });
      }

});

$("#btAgenda").click(function (e) {

 var iNomeAluno = $("#nomeAluno").val();
 var iNomeInstrutor = $("#nomeInstrutor").val();
 var iData = $("#data-input").val();
 var iHorario = $("#horario").val();
 var iQtAulas = $("#qt_aulas").val();

      if( iData == '' || iNomeAluno == '' || iNomeInstrutor == '' || iHorario == '' || iQtAulas == '' ){
        $.ajax({
          type: "POST",
          url: "checagens.php",
          data: {erro: 4, valida: 2},
            success: function(data){
            $("#return_ajax").html(data);
            }
        });
      } else {
            $.ajax({
              type: "POST",
              url: "checagens.php",
              data:
              {aluno: iNomeAluno, instrutor: iNomeInstrutor, data: iData,
                horario: iHorario, qt_aulas:iQtAulas, valida: 1, check: 1},
                success: function(data){
                $("#return_ajax").html(data);
                }
            });
      }

});

document.getElementById("btVolta").onclick = function () {
       location.href = "agenda-aulas.php";
   };




   $("#nomeAluno").change(function (e) {
      var nome_A = $("#nomeAluno").val();
      $.ajax({
       type: "POST",
       url: "checagens.php",
       data: {nome_A: nome_A, n_check: 1, valida: 3},
         success: function(data){
         $("#return_N").html(data);
         }
     });

   });
