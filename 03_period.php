<?php
/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
// DEFININDO FORMATOS DE DATAS 
define("DATETIME_BR", "d/m/Y H:i:s"); //Data e Hora no Formato Brasileiro
define("DATE_BR", "d/m/Y"); //Exibindo apenas a data no Formato Brasileiro


$inicio = new DateTime("now"); //Criado uma Data agora
$intervalo = new DateInterval("P6M"); //Criado um Periodo
$fim = new DateTime("2025-12-31"); //Criado uma data final

$periodo = new DatePeriod($inicio, $intervalo, $fim);  //Criado um data periodo, passando a data inicial, o periodo e a data final



var_dump([
    $inicio->format(DATE_BR),
    $intervalo,
    $fim->format(DATE_BR)
], $periodo, get_class_methods($periodo));


$listaDatas = [];
foreach ($periodo as $recurrences) {
    array_push($listaDatas, $recurrences->format(DATE_BR));
}

var_dump($listaDatas);
