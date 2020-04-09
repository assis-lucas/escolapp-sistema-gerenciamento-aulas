
/* calendario */
function retornaData(){
$("#data-input").change(function (e) {
    var str = e.target.value;
    $("#resultado2").text(str);
});
}

/* aluno */

function retornaAluno(){
$("#nomeAluno").change(function (e) {
    var str = e.target.value;
    $("#resultado").text(str);
});
}

/* instrutor */

function retornaInstrutor(){
$("#nomeInstrutor").change(function (e) {
    var str = e.target.value;
    $("#resultado1").text(str);
});
}

/* data */

function retornaHora(){
$("#horario").change(function (e) {
    var str = e.target.value;
    $("#resultado3").text(str);
});
}

init(); 

function init(){
	retornaData();
	retornaAluno();
	retornaInstrutor();
	retornaHora();
}

