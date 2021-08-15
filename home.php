<?php 
  // <!-- Incluindo o validador_de_acesso.php para fazer a auteticação do usuario com o require por conta se der erro acontecerá um fatal error quebrando a aplicação -->
  require_once "validador_de_acesso.php";

  // session_start(); -- // Como estamos utilizando o require e no validador_de_acesso.php ja existe o session_start(), não precisa utiliza-lo aqui
  // print_r($_SESSION); -- // Apenas para verificação de autenticação, ['id'] conecta e ['perfil_id'] para ver se é Admin ou Usuario
?> 

<!-- Incluindo Header e Navbar -->
<?php include_once "header.php"; ?>

  <body>
    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href="abrir_chamado.php">
                   <img src="img/formulario_abrir_chamado.png" width="70" height="70">
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <a href="consultar_chamado.php">
                    <img src="img/formulario_consultar_chamado.png" width="70" height="70">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
