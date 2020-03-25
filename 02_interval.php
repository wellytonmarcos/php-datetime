<?php
/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
// DEFININDO FORMATOS DE DATAS 
define("DATETIME_BR", "d/m/Y H:i:s"); //Data e Hora no Formato Brasileiro
define("DATE_BR", "d/m/Y"); //Exibindo apenas a data no Formato Brasileiro

 //Criando um Objeto de Intervalo
$intervalo = new DateInterval("P5Y15DT35M");
/** 
 * Onde:
 * P5Y15D - Período é de 5 anos e 15 Dias
 * T - informa que os comandos agora serão de tempo
 * 35M - 35 Minutos
 */
var_dump($intervalo);

//Acrescentando e Removendo intervalos de uma data
$agora = new DateTime("now");
$acres = $agora->add($intervalo);//Adiciona intervalo a data de agora
$decres = $agora->sub($intervalo); //Remove um intervalo a data de agora

var_dump($agora, $acres, $decres);

//Diferença entre datas
$nascimento = new DateTime("1990-03-24"); //Data de Nascimento 
$agora = new DateTime("now"); //Agora
$diferenca = $agora->diff($nascimento); //Diferença entre datas

var_dump($nascimento, $diferenca);

//Exemplo de diferença
if ($diferenca->invert) {
    echo "<p>Estou vivo a {$diferenca->days} dias.</p>";
} else {
    echo "<p>Vou nascer em {$diferenca->days} dias!</p>";
}

//trabalhando com Interface Estática
$agora = new DateTime("now");
$agora->sub(DateInterval::createFromDateString("30days"))->format(DATETIME_BR);
$agora->add(DateInterval::createFromDateString("30days"))->format(DATETIME_BR);

