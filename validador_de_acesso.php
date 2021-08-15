<!-- // GERALMENTE CADA SESSÃO, ATRAVEZ DOS COOKIES DURA 3HORAS
// Com o session_start podemos acessar valores entre os scripts sem que estejam ligados entre si, isso por conta de estarem na mesma sessão do navegador
// Puxando o indice 'x' do script valida_login.php
//session_start();
//echo $_SESSION['x']; // Se eu criar um indice aqui, posso acessa-lo no valida_login.php também, porém se acessar uma guia anonima ela não puxará os dados por ser outra sessão -->

<?php 

session_start();

// Isset é utilizado para verificar se determinado indice existe, porém nessa condição precisamos verificar 'se não' existe o indice, portanto utilizar o ! de negação no inicio da condição
// Caso existe retorna true, porém utilizando a negação SE NÃO EXISTIR RETORNARÁ TRUE

if(!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] != 'SIM') {
  header('Location: index.php?login=erro2'); // Redirecionar a página caso o usuario não esteja autenticado, ou seja, $_SESSION['autenticacao'] é diferente de 'SIM'
}

// ------ A linha de código - >    $_SESSION['autenticacao']; // ---- Verifica se o usuario passou pelo processo de autenticação
?> 