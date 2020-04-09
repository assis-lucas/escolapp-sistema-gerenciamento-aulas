<?php
include ("inc/conexao.php");
include ("inc/verifica.php");

        $erro = isset($_POST['erro']);
          if( $erro == 4 ){
          ?> <script>alert("Preencha todos os campos!");</script> <?php
          }

        $valida = $_POST['valida'];
          if( $valida == 1 ){
            $id_aula = $_POST[idA];
            $idInstrutor = $_POST[idI];
            $data = $_POST['data'];
            $horario = $_POST['horario'];

            $horaAula = "select * from aulas where horario = '$horario' and data = '$data' and id_instrutor = '$idInstrutor'";
            $sqlA = mysqli_query($conn, $horaAula);
            $linhasUmaAula = mysqli_num_rows($sqlA);



            if($linhasUmaAula == 0){ // Se não tiver nenhuma aula no horário selecionado IF IC

                    $check = $_POST['check'];
                    if( $check == 1 ){
                          if(!empty($horario) || !empty($data)){
                              $cadAula = "update
                            	          aulas
                            			set
                            			  horario = '$horario',
                            			  data = '$data'
                            			where
                                          id_aula = $id_aula
                            			 ";
                                                if(mysqli_query($conn, $cadAula)){ // SE A AULA FOR AGENDADA
                                                    ?> <script>alert("Aula alterada com sucesso!");
                                                              $("#data-input").val('');
                                                              $("#horario").val('');

                                                  </script> <?php
                                          }
                                } else {
                                   ?> <script>alert("Preencha todos os campos!");</script> <?php  
                                }

                             // FINAL CHECK BT
                           } else { // SE NAO APERTOU EM AGENDAR
                             ?> <script>alert("Horário para agendar aula disponível! Clique em Alterar!");</script> <?php
                           }
            } else {

            ?> <script>alert("Esse instrutor já tem uma aula agendada nesse horário!");</script> <?php
            }

}


?>
