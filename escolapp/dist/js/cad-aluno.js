// force submit form action="inseriralu.php"
//verifica-nomealuno.php

// colocar function para checar cpf e mascara com onKeyPressed
// onKeyPressed para dar select no banco com ajax e retornar por session se há algum erro

//onKeyPressed aqui com id do campo de nome

$(document).ready(function() {

      $('#btCadAluno').click(function() {
        var aluno = $('#nAluno').val();
        var cpf = $('#cpf').val();
        var aulas = $('#aulas').val();
        var cat = $('#cat').val();

            var nFieldCPF = cpf.length;

        if( aluno == '' || cpf == '' ){
            alert("Preencha todos os campos!");
            } else {
                    if( nFieldCPF != 11 ){
                    alert("Porfavor, preencha o CPF corretamente!");
                    } else {
                        $.ajax({
                        type: "GET",
                        url: "verifica-nomealuno.php",
                        data: {aluno: aluno, cpf: cpf, aulas: aulas, cat: cat},
                          success: function(data){
                            $("#ajax_return").html(data);
                          }
                        });
                    }
            }


      });
});
