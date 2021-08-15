<!-- Incluindo Header e Navbar -->
<?php include_once "header.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="card-login">
                <div class="card">
                    <div class="card-header">
                        <strong>Login Admin:</strong>
                        admin1@adm.com <br>                      
                        <strong>Login Usuário:</strong>                       
                        maria@usuario.com <br><br>

                        <strong>Senha:</strong> 1234 <br>
                    </div>
                    <div class="card-body">
                        <!-- action - Encapsula todo o form e envia os dados para valida_login.php -->
                        <!-- method - Anexa os dados do form dentro da própria requisição, retirando assim os dados da url -->
                        <form action="valida_login.php" method="post">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input name="senha" type="password" class="form-control" placeholder="Senha">
                            </div>

                            <!-- TRATANDO ERRO QUANDO ERRA A SENHA OU EMAIL -->

                            <!-- // GET pegando o indice da url caso dê erro -->
                            <?php if(isset($_GET['login']) && ($_GET['login']) == 'erro') { ?> <!-- Verifica se existe esse indice e se ele é igual á erro -- // Isset Verifica se um determinado indice de um determinado array está setado -->                         
                          
                            <!-- Código em html, usando os dois blocos phps e deixando a tag de fechado do if no segundo bloco, é possível criar códigos html entre os 2 blocos e ele só aparecerá caso a condição do if seja true -->
                            <div class="text-danger">
                               Usuário ou senha inválido(s)!
                            </div>

                               <!-- } fechando o if está nesse outro bloco php, onde os dois bloco php só será utilizado caso entre na condição do if -->
                            <?php } ?> 


                           <!-- TRATANDO ERRO QUANDO ACESSA AS PÁGINAS PROTEGIDAS SEM AUTENTICAR O USUÁRIO -->

                            <!-- // GET pegando o indice da url caso dê erro -->
                            <?php if(isset($_GET['login']) && ($_GET['login']) == 'erro2') { ?> <!-- Verifica se existe esse indice e se ele é igual á erro -- // Isset Verifica se um determinado indice de um determinado array está setado -->                         
                          
                            <!-- Código em html, usando os dois blocos phps e deixando a tag de fechado do if no segundo bloco, é possível criar códigos html entre os 2 blocos e ele só aparecerá caso a condição do if seja true -->
                            
                            <div class="text-danger">
                                Primeiro realize o Login para acessar essas Páginas!
                            </div>

                            <!-- } fechando o if está nesse outro bloco php, onde os dois bloco php só será utilizado caso entre na condição do if -->
                            <?php } ?> 

                            <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>