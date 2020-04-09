<?php
include ("inc/conexao.php");
include ("inc/verifica.php");

        $erro = isset($_POST['erro']);
      if( $erro == 4 ){
        ?> <script>alert("Preencha todos os campos!");</script> <?php
      }


             $n_check = $_POST['n_check'];

                if( $n_check == 1 ){
                $nome_A = $_POST['nome_A'];
                $queryAulasR = "select aulas_restantes from alunos where nome_aluno ='$nome_A'";
                $sqlF = mysqli_query($conn, $queryAulasR);
                $dadosF = mysqli_fetch_object($sqlF);

                $aulasQtd = $dadosF->aulas_restantes;
                echo $aulasQtd;
                }


       $valida = $_POST['valida'];

          if( $valida == 1 ){

        $nAluno = $_POST['aluno'];
        $nInstrutor = $_POST['instrutor'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $qtAulas = $_POST['qt_aulas'];

        $queryId = "select id_aluno, aulas_restantes from alunos where nome_aluno ='$nAluno'";
        $sql = mysqli_query($conn, $queryId);
        $dados = mysqli_fetch_object($sql);

        $queryIdInstrutor = "select id_instrutor from instrutores where nome_instrutor ='$nInstrutor'";
        $sqlB = mysqli_query($conn, $queryIdInstrutor);
        $dadosB = mysqli_fetch_object($sqlB);

        $idAluno = $dados->id_aluno;
        $aulasRest = $dados->aulas_restantes;
        $idInstrutor = $dadosB->id_instrutor;

              if($aulasRest >= 1){ // Aluno tem mais de uma aulas restantes para agendar
                      if($qtAulas == 1){ // Se for uma aula para agendar

                        $horaAula = "select * from aulas where horario = '$horario' and data = '$data' and id_instrutor = '$idInstrutor'";
                        $sqlA = mysqli_query($conn, $horaAula);
                        $linhasUmaAula = mysqli_num_rows($sqlA);

                                                if($linhasUmaAula == 0){ // Se não tiver nenhuma aula no horário selecionado IF IC

                                                        $check = $_POST['check'];
                                                        if( $check == 1 ){

                                                            $cadAula = "insert into aulas (horario,data,id_instrutor,id_aluno)
                                                            values('$horario','$data',$idInstrutor,$idAluno)";
                                                                              if(mysqli_query($conn, $cadAula)){ // SE A AULA FOR AGENDADA

                                                                                $RemoveUmaAula = $aulasRest - 1;
                                                                                //REMOVE UMA AULA
                                                                            	   $updateQtAulas = "update
                                                                                	          alunos
                                                                                			set
                                                                                			  aulas_restantes = '$RemoveUmaAula'
                                                                                			where
                                                                                        id_aluno = $idAluno";

                                                                                	      mysqli_query($conn, $updateQtAulas);

                                                                                ?> <script>alert("Aula agendada com sucesso!");
                                                                                            $("#nomeAluno").val('');
                                                                                            $("#nomeInstrutor").val('');
                                                                                            $("#data-input").val('');
                                                                                            $("#horario").val('');
                                                                                            $("#qt_aulas").val('');
                                                                                </script> <?php
                                                                              }

                                                                 // FINAL CHECK BT
                                                               } else { // SE NAO APERTOU EM AGENDAR
                                                                 ?> <script>alert("Horário para agendar aula disponível! Clique em Agendar!");</script> <?php
                                                               }
                                                } else {
                                                    ?> <script>alert("Esse instrutor já tem uma aula agendada nesse horário!");</script> <?php
                                                }

                            }

                          }

               if($aulasRest >= 2){ // Aluno tem mais ou igual a duas aulas restantes para agendar
                  if ($qtAulas == 2){ // Se for duas aulas para agendar
                        if( $horario == '22:00' ){
                          ?> <script>alert('Voce só pode agendar uma aula nesse horário!');</script> <?php
                        } else { // Se o horario nao for 22:00

                          //Select que ve se o instrutor selecionado já tem alguma aula agendada no primeiro horario
                          $horaUmaAula = "select * from aulas where horario = '$horario' and data = '$data' and id_instrutor = '$idInstrutor'";
                          $sqlC = mysqli_query($conn, $horaUmaAula);
                          $linhasUmaAulaA = mysqli_num_rows($sqlC);

                                    if( $linhasUmaAulaA == 0 ){ // Primeira aula pode ser marcada.
                                          $OneMore = date('H:i',strtotime('+1 hour',strtotime($horario))); // Adiciona mais uma hora
                                          $horaDuasAulas = "select * from aulas where horario = '$OneMore' and data = '$data' and id_instrutor = '$idInstrutor'";
                                          $sqlD = mysqli_query($conn, $horaDuasAulas);
                                          $linhasSegundaAula = mysqli_num_rows($sqlD);

                                        if( $linhasSegundaAula == 0 ){ // Segunda aula pode ser marcada.

                                              $check = $_POST['check'];
                                              if( $check == 1 ){

                                                  $cadAula = "insert into aulas (horario,data,id_instrutor,id_aluno)
                                                  values('$horario','$data',$idInstrutor,$idAluno)";
                                                  $cadDuas = "insert into aulas (horario,data,id_instrutor,id_aluno)
                                                  values('$OneMore','$data',$idInstrutor,$idAluno)";

                                                                    if(mysqli_query($conn, $cadAula) && mysqli_query($conn, $cadDuas)){ // SE AS AULAS FOREM AGENDADAS

                                                                      $RemoveUmaAula = $aulasRest - 2;
                                                                      //REMOVE DUAS AULAS
                                                                       $updateQtAulas = "update
                                                                                  alunos
                                                                            set
                                                                              aulas_restantes = '$RemoveUmaAula'
                                                                            where
                                                                              id_aluno = $idAluno";

                                                                        mysqli_query($conn, $updateQtAulas);

                                                                        $msgSucess = "Aulas agendadas com sucesso! $horario e $OneMore";
                                                                        ?> <script>alert('<?php echo $msgSucess;?>');
                                                                                  $("#nomeAluno").val('');
                                                                                  $("#nomeInstrutor").val('');
                                                                                  $("#data-input").val('');
                                                                                  $("#horario").val('');
                                                                                  $("#qt_aulas").val('');
                                                                      </script> <?php
                                                                    }

                                                       // FINAL CHECK BT
                                                     } else { // SE NAO APERTOU EM AGENDAR
                                                       ?> <script>alert("Horário para agendar as duas aulas disponíveis! Clique em Agendar!");</script> <?php
                                                     }

                                        } else { // Segunda aula nao pode ser marcada.
                                        $msgN = "A aula das $horario pode ser agendada, mas a aula das $OneMore nao pode ser agendada. Escolha outro horário e tente novamente!";
                                        ?> <script>alert('<?php echo $msgN;?>');</script> <?php
                                        }

                                    }

                        } // Se nao for horario FIM
                  } // fim QT aulas
              } // Fim AulasRest

          if ($aulasRest <= 0) { // Se não tiver aulas para agendar
            ?> <script>alert("Esse aluno não tem aulas suficientes para agendar!");</script> <?php
          }

  }


?>
