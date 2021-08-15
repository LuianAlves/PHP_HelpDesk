<?php

// Para o iniciar recurso de sessão, sendo crucial utilizar a instrução session_start() sempre antes de qualquer comando referente á sessão, sendo por padrão sempre instanciada no inicio do script php
// session_start();
// $_SESSION['x'] = 'Oi, sou um valor de sessão';
// print_r($_SESSION); // Ao iniciar a sessão temos acesso á super global _SESSION, sendo também um array
// echo '<hr>';

session_start();


// Criando variavel para verificar se a autenticação do usuário foi realizada
$usuario_autenticado = false; // False, pois ela só será true caso entre na condição if onde será comparado se o $user é igual ao $post
$usuario_id = null;
$usuario_perfil_id = null; // Variavel para conseguir utilizar o 3° parametro 'perfil_id' de forma global 

// Criando um array para filtrar entre admin e usuarios[1 -> Admins e 2 -> Usuarios]
$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

//  Criando um Array para a Relação de usuários na aplicação
$usuarios_app = array( // -- Filtrando entre adms e usuarios comuns com um novo elemento chamado 'id' | APÓS O PARAMETRO DE SENHA FOI ACRESCENTADO O 'perfil_id', onde 1 é admin e 2 é usuario
    array('id' => 1, 'email' => 'admin1@adm.com', 'senha' => '1234', 'perfil_id' => 1),
    array('id' => 2, 'email' => 'admin2@adm.com', 'senha' => '1234', 'perfil_id' => 1),
    array('id' => 3, 'email' => 'jose@usuario.com', 'senha' => '1234', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'maria@usuario.com', 'senha' => '1234', 'perfil_id' => 2),
);

/*
echo '<pre>';
print_r($usuarios_app);
echo '<pre>';
*/

// Percorrer cada um dos indices do array para saber se o usuario e senha existem

foreach($usuarios_app as $user) { // O 'as' nos da acesso a cada um dos valores do array de forma individual apelidando-o, ou seja, o $usuarios_app passa a ser chamado tambem como $user
// Verificando se o email e senha da aplicação são iguais aos recebidos via post

    if($user ['email'] == $_POST['email'] && $user ['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
        $usuario_id = $user['id']; // Recuperando o id e atribuindo o valor de id á váriavel $usuario_id, permindo assim a variavel $usuario_id ser acessada nos valores de sessão caso o usuario for autenticado | LEMBRANDO QUE $usuarios_app é o mesmo que $user   
        $usuario_perfil_id = $user['perfil_id']; // Caso autenticado, o perfil_id vai ajudar a filtrar entre Admin e Usuario
    }
}

// Caso a condição acima seja realizada, ou seja, o email e senha for igual ao recebido via post, entrará nessa nova condição
    if($usuario_autenticado) {
        echo 'Usuário autenticado!';
        // Caso o usuario esteja autenticado, nas páginas que precisam da autenticação é só comparar se $_SESSION for igual a SIM, podendo então mostrar os dados
        $_SESSION['autenticacao'] = 'SIM'; 
        // Permindo que o id possa ser acessado como escopo GLOBAL na aplicação
        $_SESSION['id'] = $usuario_id;
        // Permitindo que o perfil_id onde ocorre a filtragem entre Admin e Usuario seja acessado no escopo GLOBAL 
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        // Se for autenticado, forçar redirecionamento para home.php
        header('Location: home.php?login=success'); 
    } else {
        // Caso o usuario não esteja autenticado
        $_SESSION['autenticacao'] = 'NAO';
        // Header faz o direcionamento de página, nesse caso quando errar a senha ele redicionará para o index.php
        header('Location: index.php?login=erro'); 
    }







// Recuperando os parametros do login utilizar a super global $_GET
// $_GET é um Array, porém após utilizar o metho="post"  o GET não é mais preenchido, portanto não necessário

/* --
print_r($_GET); // Recuperar os dados usando o GET

echo '<br />';

echo $_GET['email']; // Pegando os dados atravez do name nos inputs
echo '<br />';
echo $_GET['senha'];

-- */

// Utilizando o POST, que também é um array
// Recuperou os dados do mesmo jeito que o GET, entretanto os dados não estão expostos na url

/*
print_r($_POST);

echo '<br />';

echo $_POST['email']; // Pegando os dados atravez do name nos inputs
echo '<br />';
echo $_POST['senha'];
*/