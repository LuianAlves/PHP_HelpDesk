<?php 

// Recebendo o envio do form atravez da super Global POST
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

session_start(); // Criado para acessa a variavel de sessão ['id']

// Definir o que será escrito no Arquivo TxT, formatando o Array em estrutura de texto para ser mais simples
// # serve como caracter de separação, porém se existir algum # nos dados vindo do form teremos que substitui-lo por outro caracter

// Criando variaveis utilizando o str_replace para substituir o # caso exista no forml
$titulo = str_replace('#', '(-)', $_POST['titulo']);
$categoria = str_replace('#', '(-)', $_POST['categoria']);
$descricao = str_replace('#', '(-)', $_POST['descricao']);

// Agora atribuir as variaveis tratadas ao $texto | A constante PHP_EOL faz a quebra de linha automaticamente de acordo com o Sistema Operacional rodando
// Como criamos o session_start em cima, podemos acessar o indice de sessão id e adiciona-lo ao arquivo TxT
$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

// Criar arquivo de TEXTO para salvar os chamados
// Utilizar o metodo fopen('', '') que espera 2 parametros: primeiro o nome do arquivo 'arquivo.(A extensão não importa muito, podendo ser .hd[hd = helpdesk])' | segundo parametro espera: ler arquivo, abrir arquivo, posicionar o cursor do mouse no final .. 
// Caso não existe o arquivo, ele será criado
// 2° Parametro: Muitos tipos disponiveis em php.net -> pesquisar por fopen
// ' a ' abre um arquivo para escrita colocando o cursor no final do arquivo | ' r ' abre somente para leitura colocando o cursor no inicio do arquivo | ' r+ ' abre para leitura e escrita colocando o cursor no inicio do arquivo | ' w ' abre somente para escrita colocando o cursor no inicio do arquivo | '  ' 

$arquivo = fopen('_app_help_desk/arquivo_chamado.txt', 'a');

// Utilizar o fwrite() para escrever o $texto dentro do arquivo TxT
// fwrite espera 2 parametros: 1° referencia do arquivo que abrimos, variavel $arquivo | 2° a referencia do que vamos escrever no arquivo TxT, variavel $texto
fwrite($arquivo, $texto);

// Fechar o arquivo após escrita usando o fclose() que recebe apenas 1 parametro que é o nome do arquivo
fclose($arquivo);

// Redirecionar a página após abrir o chamado
header('Location: consultar_chamado.php'); // ------ Aqui podemos criar uma nova Página mostrando que o chamado foi aberto

?>