<?php 
// Para fazer Logoff existem algumas possibilidades como:


// Como vamos mexer com sessões é crucial iniciar com:
session_start();

/*
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// Remover itens do array de sessão
// Utilizando o unset() é possível remover indices de qualquer array, podendo ser indices das super globais GET E POST 

// Usando o unset para remover apenas um indice, UM DETALHE, ELE VERIFICA SE EXISTE O EXISTE PARA EXCLUIR, CASO NÃO EXISTA ELE NÃO DA ERRO 
unset($_SESSION['x']); // O unset remove apenas o indice selecionado, ou seja, removerá apenas o indice 'x'

// Destruir a váriavel de sessão
// Para isso tem uma função específica chamada session_destroy() que remove todos os indices dentro da super global session

// Usando a session_destroy() para destruir todos os indices

session_destroy(); // Mesmo destruindo todos os indices ainda continuaremos visualizando os indices, somente após uma segunda auteticação que não teremos mais acesso ás variaveis da sessão
// POR ISSO, é muito comum forçar um redirecionamento após o session_destroy

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
*/

// Utilizando o session_destroy e redirecionando a página
session_destroy(); 
header('Location: index.php');
?>
