<?php
/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */

// DEFININDO FORMATOS DE DATAS 
define("DATETIME_BR", "d/m/Y H:i:s"); //Data e Hora no Formato Brasileiro
define("DATE_BR", "d/m/Y"); //Exibindo apenas a data no Formato Brasileiro

// CRIANDO OBJETOS 
$agora = new DateTime();                  //Criando uma nova data hora de agora
$avulsa = new DateTime("2020-02-02");        //Criando uma data a partir de uma data específica (Usar Americano)
$estatica = DateTime::createFromFormat('Y-m-d', "2020-02-02"); //Criando a partir de uma objeto estático a partir de um formato, sem instaciar

var_dump(
    $agora,
    $avulsa,
    $estatica
);

//FORMATANDO DATETIME
$agoraDateTimeBr = $agora->format(DATETIME_BR); //Utilizando data e hora BR
$agoraDateBr = $agora->format(DATE_BR); //Utilizando apenas data BR

var_dump(
    $agoraDateTimeBr,
    $agoraDateBr,
);

$somenteDia = $agora->format('d'); //Exibe apenas o dia (numero)
$somenteDiaS = $agora->format('l'); //Exibe apenas o dia (Str da semana)
$somenteMes = $agora->format('m'); //Exibe apenas o mes (numero)
$somenteMesS = $agora->format('M'); //Exibe apenas o mes (Str abreviado)
//Consultar formatos em: https://www.php.net/manual/en/function.date.php

var_dump([
    $somenteDia,
    $somenteDiaS,
    $somenteMes,
    $somenteMesS
]);

//Formatando TimeZone
$saoPauloTimeZone = new DateTimeZone("America/Sao_Paulo");
$apiaTimeZone = new DateTimeZone("Pacific/Apia");
$agoraSaoPaulo = new DateTime("now", $saoPauloTimeZone);
$agoraApia = new DateTime("now", $apiaTimeZone);

var_dump([
    $saoPauloTimeZone,
    $apiaTimeZone,
    $agoraSaoPaulo,
    $agoraApia,
    $agora
]);

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);


$dateInterval = new DateInterval("P10Y2MT10M");
var_dump($dateInterval);

$dateTime = new DateTime("now");
//$dateTime->add($dateInterval);
$dateTime->sub($dateInterval);

var_dump($dateTime);


$birth = new DateTime("2018-07-01");
$dateNow = new DateTime("now");

$diff = $dateNow->diff($birth);

var_dump($birth, $diff);

if ($diff->invert) {
    echo "<p>Seu aniversáio foi a {$diff->days} dias.</p>";
} else {
    echo "<p>Faltam {$diff->days} para seu aniversário!</p>";
}


$dateResources = new DateTime("now");
var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateResources->add(DateInterval::createFromDateString("20days"))->format(DATE_BR),
]);


/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime("now");
$interval = new DateInterval("P6M");
$end = new DateTime("2020-01-25");

$period = new DatePeriod($start, $interval, $end);

var_dump([
    $start->format(DATE_BR),
    $interval,
    $end->format(DATE_BR)
], $period, get_class_methods($period));


echo "<h1>Sua Assinatura:</h1>";
foreach ($period as $recurrences) {
    echo "<p>Proximo vencimento {$recurrences->format(DATE_BR)}</p>";
}
