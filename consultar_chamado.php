<!-- Incluindo o validador_de_acesso.php para fazer a auteticação do usuario com o require por conta se der erro acontecerá um fatal error quebrando a aplicação -->
<?php require_once "validador_de_acesso.php" ?>

<?php 

// Declarando um Array para listar todos os $registro (Criado dentro do laço de while)
$chamados = array();


// Abrir o Arquivo TxT (arquivo_chamado.txt) com os chamados utilizando o fopen() mudando o 2° parametro de ' a ' para ' r ' que permite somente a leitura do arquivo
$arquivo = fopen('_app_help_desk/arquivo_chamado.txt', 'r');

// Utilizar o while para percorrer o arquivo enquanto houver linhas para serem lidas
// Utilizar como condição a instrução FEOF() que percorre qualquer arquivo até chegar ao fim, ou seja, após reconhecer que não existe mais linhas ou caracteres ele para o while

// A função feof retorna true somente quando não houver mais linhas e chegar no final do arquivo, porém a condição precisa que retorne UM VALOR TRUE, ou seja, 
//  precisamos usar o operador de negação '!', tornando cada linha que era 'false' em true

while(!feof($arquivo)){ 
  // Utilizar o fgets() para recuperar o que tiver no parametro, ou seja, recuperar tudo que tiver na linha no arquivo_chamado.txt
  // Quando passar o primeiro laço do while, o fgets pula e inicia na segunda, continuando assim até o feof() retornar o valor ''true' que por conta do operador de negação será 'false' que indica que estamos no final do arquivo, saindo assim do laço while
  
  // Associar uma variavel ao fgets para reutilizar depois
  $registro = fgets($arquivo);
  // Utilizar o array para guardar todos os registros
  $chamados[] = $registro;
}

// NÃO ESQUECER DE FECHAR O ARQUIVO ABERTO APÓS  
fclose($arquivo);

?>

<!-- Incluindo Header e Navbar -->
<?php include_once "header.php"; ?>

  <body>
    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <!-- Percorrer o Array de chamados utilizando o foreach(), em seguida apelida-lo como $chamado para receber o valor dentro do array $chamados -->
              <?php foreach($chamados as $chamado) { ?>

              <!-- <.?= -> É uma tag de impressão do php, para imprimir o chamado a cada intereção do foreach-->
              <!-- NESSA TAG NÃO TEM ESPAÇO | < ?= $chamado.'<br />'; ?> | -->

              <?php
              // Utilizar o método explode() que permite criar um array com base num delimitador, ou seja, utilizaremos o ' # ' para que cada bloco de informações sejam atribuidos a um novo array                      
              // Criar uma nova variavel utilizando o explode em conjuto com o #
              $chamado_dados = explode('#', $chamado);

              // print_r($chamado_dados); -- // Testando na página de consulta todos os array, onde o indice [0] é o id do usuario 

              // Utilizar o if para testar se o perfil é ADMIN ou USUÁRIO
              // Caso o ['perfil_id'] seja == 1, não entrará na condição if, logo não haverá filtragem e o Admin poderá visualizar todos os chamados
              if($_SESSION['perfil_id'] == 2) { // == 2 significa que é apenas um Usuario, logo filtrar a consulta para apenas chamados feitos por esse usuario utilizando também o $usuario_id
                // Criar outra condição para verificar se o indice ['id'] é diferente do ['id'] do usuario que fez o chamado
                if($_SESSION['id'] != $chamado_dados[0]) { // Verificando se 'id' é diferente do 'id' em $chamado_dados onde o 'id' é identificado com indice [0]
                  continue; // Continue, pois se o 'id' for diferente, ignorará essa consulta ja que não foi feita pelo usuario, portanto se for igual mostrará o chamado. Assim permite a filtragem onde cada usuario visualiza apenas os chamados feitos por ele 
                }
              }

              // Testando se existe alguma linha incompleta, se houver utilizar o 'continue' para pular 
              // Utilizar o count() para contar os dados dentro do array chamado_dados, se for inferior a 3 ('3 por conta de ser apenas titulo, categoria e descrição') o count reconhecerá que está incompleto e o continue pulará esse chamado
              if(count($chamado_dados) < 3){ continue; } // Para testar esse condição é só pular uma linha no arquivo_chamado.txt, que aí o count reconhecerá que está faltando titulo, categoria e descrição e pulará essa linha incompleta
              ?>

              <!-- Utilizar a tag de impresso do php com o array chamado_dados e atribuir cada indice ao local indicado, ou seja, [0] é o titulo, [1] categoria e [2] descrição -->
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                  <p class="card-text"><?=$chamado_dados[3]?></p>
                </div>
              </div>

              <!-- Utilizar o 2° bloco de bloco com fechamento '}' do foreach para encapsular todo o código html  -->
              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
