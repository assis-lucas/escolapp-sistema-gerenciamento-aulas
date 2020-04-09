$("#horario").change(function (e) {

 var idI = $("#idInstrutor").val();
 var idA = $("#idAula").val();
 var iData = $("#campoDt").val();
 var iHorario = $("#horario").val();


      if( iData == '' || iHorario == '' ){
        $.ajax({
          type: "POST",
          url: "checagens-altera-a.php",
          data: {erro: 4, valida: 2},
            success: function(data){
            $("#return_ajax").html(data);
            }
        });
      } else {
            $.ajax({
              type: "POST",
              url: "checagens-altera-a.php",
              data:
              {data: iData, idI: idI, horario: iHorario, idA: idA,  valida: 1},
                success: function(data){
                $("#return_ajax").html(data);
                }
            });
      }

});

$("#btAgenda").click(function (e) {

 var idI = $("#idInstrutor").val();
 var idA = $("#idAula").val();
 var iData = $("#campoDt").val();
 var iHorario = $("#horario").val();

      if( iData == '' || iHorario == '' ){
        $.ajax({
          type: "POST",
          url: "checagens-altera-a.php",
          data: {erro: 4, valida: 2},
            success: function(data){
            $("#return_ajax").html(data);
            }
        });
      } else {
            $.ajax({
              type: "POST",
              url: "checagens-altera-a.php",
              data:
              {data: iData, horario: iHorario, idI: idI ,idA: idA, valida: 1, check: 1},
                success: function(data){
                $("#return_ajax").html(data);
                }
            });
      }

});


document.getElementById("btVolta").onclick = function () {
       location.href = "agenda-aulas.php";
   };
